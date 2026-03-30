<?php

namespace App\Services\Payments\Gateways;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Services\Payments\Contracts\PaymentGatewayInterface;
use GuzzleHttp\Client;

class PayPalGateway implements PaymentGatewayInterface
{
    private Client $http;
    private string $base;
    private string $clientId;
    private string $secret;

    public function __construct(private array $cfg)
    {
        $this->base = $cfg['mode'] === 'live'
            ? 'https://api-m.paypal.com'
            : 'https://api-m.sandbox.paypal.com';
        $this->clientId = $cfg['client_id'];
        $this->secret   = $cfg['client_secret'];
        $this->http = new Client(['base_uri' => $this->base]);
    }

    private function token(): string
    {
        $res = $this->http->post('/v1/oauth2/token', [
            'auth' => [$this->clientId, $this->secret],
            'form_params' => ['grant_type' => 'client_credentials'],
        ]);
        return json_decode($res->getBody(), true)['access_token'];
    }

    public function createCheckout(Payment $payment, array $options = []): array
    {
        $access = $this->token();

        $res = $this->http->post('/v2/checkout/orders', [
            'headers' => ['Authorization' => "Bearer {$access}"],
            'json' => [
                'intent' => 'CAPTURE',
                'purchase_units' => [[
                    'amount' => [
                        'currency_code' => strtoupper($payment->currency),
                        'value' => number_format($payment->amount / 100, 2, '.', ''),
                    ],
                    'reference_id' => $payment->public_id,
                    'description' => $options['description'] ?? 'Payment',
                ]],
                'application_context' => [
                    'return_url' => route('payments.success', $payment->public_id),
                    'cancel_url' => route('payments.cancel',  $payment->public_id),
                    'brand_name' => config('app.name'),
                    'shipping_preference' => 'NO_SHIPPING',
                    'user_action' => 'PAY_NOW',
                ],
            ],
        ]);

        $order = json_decode($res->getBody(), true);
        $payment->provider_ref = $order['id'];
        $payment->status = 'requires_action';
        $payment->save();

        $approve = collect($order['links'])->firstWhere('rel', 'approve')['href'] ?? null;

        return ['type' => 'redirect', 'url' => $approve];
    }

    public function capture(Payment $payment, array $payload = []): Payment
    {
        // For server-side capture (after return_url)
        $access = $this->token();
        $this->http->post("/v2/checkout/orders/{$payment->provider_ref}/capture", [
            'headers' => ['Authorization' => "Bearer {$access}", 'Content-Type' => 'application/json'],
            'json' => new \stdClass(),
        ]);

        // PayPal will also send a webhook; but you can mark as succeeded here:
        $payment->status = 'succeeded';
        $payment->save();
        event(new \App\Events\PaymentCompleted($payment));

        return $payment;
    }

    public function handleWebhook(Request $request): void
    {
        // Optional: validate signature via transmission headers + your webhook id
        $data = $request->all();
        $event = $data['event_type'] ?? null;

        if ($event === 'CHECKOUT.ORDER.APPROVED') {
            $orderId = $data['resource']['id'] ?? null;
            $payment = Payment::where('provider_ref', $orderId)->first();
            if ($payment) {
                // You may want to auto-capture here instead of in return_url
                $this->capture($payment);
            }
        }

        if ($event === 'PAYMENT.CAPTURE.REFUNDED') {
            $orderId = data_get($data, 'resource.supplementary_data.related_ids.order_id');
            $payment = Payment::where('provider_ref', $orderId)->first();
            if ($payment) {
                $payment->status = 'refunded';
                $payment->save();
                event(new \App\Events\PaymentRefunded($payment));
            }
        }
    }

    public function refund(Payment $payment, ?int $amount = null): Payment
    {
        $access = $this->token();
        // Need a capture id; here we fetch order details to find it
        $res = $this->http->get("/v2/checkout/orders/{$payment->provider_ref}", [
            'headers' => ['Authorization' => "Bearer {$access}"],
        ]);
        $order = json_decode($res->getBody(), true);

        $captureId = data_get($order, 'purchase_units.0.payments.captures.0.id');
        if ($captureId) {
            $payload = [];
            if ($amount) {
                $payload = [
                    'amount' => [
                        'value' => number_format($amount / 100, 2, '.', ''),
                        'currency_code' => strtoupper($payment->currency),
                    ]
                ];
            }
            $this->http->post("/v2/payments/captures/{$captureId}/refund", [
                'headers' => ['Authorization' => "Bearer {$access}"],
                'json' => $payload ?: new \stdClass(),
            ]);

            $payment->status = $amount && $amount < $payment->amount ? 'partially_refunded' : 'refunded';
            $payment->save();
        }

        return $payment;
    }
}
