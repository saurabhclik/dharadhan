<?php

namespace App\Services\Payments;

use App\Models\Billing;
use App\Models\Payment;
use App\Models\Shipment;
use App\Services\Payments\GatewayFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentManager
{
    public function __construct(private GatewayFactory $factory) {}

    public function init(string $provider, int $amount, string $currency = null, array $options = [], array $shipmentData = []): array
    {
        $billing = Billing::create([
            'invoice_no' => get_invoice_number(),
            'date' => now(),
            'amount' => $amount,
            'currency' => $currency ?: config('payments.default_currency'),
            'status' => 'unpaid',
            'user_id' => auth()->id(),
        ]);

        $payment = Payment::create([
            'shipment_id' => session('shipment_id'),
            'billing_id' => $billing->id,
            'public_id' => $options['meta']['payment_public_id'] ?? (string) Str::uuid(),
            'provider'  => $provider,
            'amount'    => $amount,
            'currency'  => $currency ?: config('payments.default_currency'),
            'status'    => 'pending',
            'meta'      => $options['meta'] ?? [],
            'user_id'    => $shipmentData['user_id'] ?? null,
            'payment_method' => $provider
        ]);

        try {
            $gateway = $this->factory->make($provider);
            return $gateway->createCheckout($payment, $options);
        } catch (\App\Exceptions\PaymentException $e) {
            // Mark as failed
            $payment->status = 'failed';
            $payment->meta = array_merge($payment->meta ?? [], ['error' => $e->getMessage()]);
            $payment->save();

            // Bubble up to controller
            throw $e;
        }
    }

    public function capture(Payment $payment, array $payload = []): Payment
    {
        return $this->factory->make($payment->provider)->capture($payment, $payload);
    }

    public function refund(Payment $payment, ?int $amount = null): Payment
    {
        return $this->factory->make($payment->provider)->refund($payment, $amount);
    }

    public function handleWebhook(string $provider, Request $request): void
    {
        $this->factory->make($provider)->handleWebhook($request);
    }
}
