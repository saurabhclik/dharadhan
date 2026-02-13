<?php

namespace App\Services\Payments\Gateways;

use \App\Events\PaymentFailed;
use App\Events\PaymentCompleted;
use App\Events\PaymentRefunded;
use App\Models\Payment;
use App\Services\Payments\Contracts\PaymentGatewayInterface;
use Illuminate\Http\Request;
use Stripe\StripeClient;
use Carbon\Carbon;

class StripeGateway implements PaymentGatewayInterface
{
    public function __construct(private array $cfg)
    {
        $this->client = new StripeClient($this->cfg['secret']);
    }

    public function createCheckout(Payment $payment, array $options = []): array
    {
        try {
            $amount = formatAmountForGateway($payment->amount, $payment->payment_method);
            // Create a Checkout Session (redirect flow)
            $session = $this->client->checkout->sessions->create([
                'mode' => 'payment',
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => strtolower($payment->currency),
                        'unit_amount' => $amount,
                        'product_data' => ['name' => $options['description'] ?? 'Payment'],
                    ],
                    'quantity' => 1,
                ]],
                'success_url' => route('payments.success', $payment->public_id),
                'cancel_url'  => route('payments.cancel',  $payment->public_id),
                'metadata' => [
                    'payment_public_id' => $payment->public_id,
                ],
            ]);

            $payment->provider_ref = $session->id;
            $payment->status = 'requires_action';
            $payment->save();

            return [
                'type' => 'redirect',
                'url'  => $session->url,
            ];
        } catch (\Throwable $e) {
            throw new \App\Exceptions\PaymentException(
                "Stripe checkout creation failed",
                ['provider' => 'stripe', 'error' => $e->getMessage()],
                500,
                $e
            );
        }
    }

    public function capture(Payment $payment, array $payload = []): Payment
    {
        // Not needed for Checkout Session (webhook will confirm). Return current state.
        return $payment->refresh();
    }

    public function handleWebhook(Request $request): void
    {
        $payload = $request->getContent();
        $sig     = $request->header('Stripe-Signature');
        $secret  = $this->cfg['webhook_secret'];

        try {
            $event = \Stripe\Webhook::constructEvent($payload, $sig, $secret);
            \Log::info($event);
            switch ($event->type) {
                case 'checkout.session.completed':
                    $session = $event->data->object;
                    $publicId = $session->metadata->payment_public_id ?? null;
                    if (!$publicId) break;

                    $payment = Payment::where('public_id', $publicId)->first();
                    if (!$payment) break;

                    if ($session->payment_status === 'paid') {
                        $payment->payer_email = $session->customer_details->email;
                        $payment->payer_name = $session->customer_details->name;
                        $payment->transaction_type = $event->type;
                        $payment->payment_date = Carbon::createFromTimestamp($session->created);
                        $payment->transaction_id = $session->id;
                        $payment->status = 'paid';
                        $payment->provider_ref = $session->id;
                        $payment->save();

                        $payment->billing->update(['status' => 'paid']);

                        event(new PaymentCompleted($payment));
                    }
                    break;

                case 'charge.refunded':
                    $charge = $event->data->object;
                    $payment = Payment::where('provider_ref', $charge->payment_intent ?? $charge->id)->first();
                    if ($payment) {
                        $payment->status = 'refunded';
                        $payment->transaction_id = $charge->payment_intent ?? $charge->id;
                        $payment->save();

                        event(new PaymentRefunded($payment, [
                            'id'     => $charge->id,
                            'amount' => $charge->amount,
                            'reason' => $charge->reason ?? 'Refunded via Stripe',
                        ]));
                    }
                    break;

                case 'checkout.session.async_payment_failed':
                case 'payment_intent.payment_failed':
                    $object = $event->data->object;

                    // In async_payment_failed it's a session, in payment_failed it's a payment intent
                    $publicId = $object->metadata->payment_public_id ?? null;
                    $payment = $publicId
                        ? Payment::where('public_id', $publicId)->first()
                        : Payment::where('provider_ref', $object->id)->first();

                    if ($payment) {
                        $reason = $object->last_payment_error->message
                            ?? ($object->cancellation_reason ?? 'Payment failed');

                        $payment->status = 'failed';
                        $payment->save();

                        $payment->billing->update(['status' => 'unpaid']);

                        event(new PaymentFailed($payment, $reason));
                    }
                    break;
            }
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            \Log::info('Invalid signature');
        }


    }

    public function refund(Payment $payment, ?int $amount = null): Payment
    {
        // If you used Checkout Session, refund the underlying PaymentIntent
        // Load session to get the payment_intent
        $session = $this->client->checkout->sessions->retrieve($payment->provider_ref, ['expand' => ['payment_intent']]);
        $intentId = $session->payment_intent->id ?? null;

        if ($intentId) {
            $this->client->refunds->create([
                'payment_intent' => $intentId,
                'amount' => $amount, // null = full
            ]);
            $payment->status = $amount && $amount < $payment->amount ? 'partially_refunded' : 'refunded';
            $payment->save();
        }

        return $payment;
    }
}
