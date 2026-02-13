<?php

namespace App\Services\Payments\Gateways;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Services\Payments\Contracts\PaymentGatewayInterface;
use Illuminate\Support\Str;

class ETransferGateway implements PaymentGatewayInterface
{
    public function __construct(private array $cfg) {}

    public function createCheckout(Payment $payment, array $options = []): array
    {
        $ref = strtoupper(Str::random(10));
        $payment->provider_ref = $ref;
        $payment->status = 'pending';
        $meta = $payment->meta ?? [];
        $meta['instructions'] = str_replace('{{reference}}', $ref, $this->cfg['instructions']);
        $payment->meta = $meta;
        $payment->save();

        return [
            'type' => 'instructions',
            'reference' => $ref,
            'text' => $payment->meta['instructions'],
        ];
    }

    public function capture(Payment $payment, array $payload = []): Payment
    {
        // Admin or reconciliation job sets to succeeded when funds received
        $payment->status = 'succeeded';
        $payment->save();
        event(new \App\Events\PaymentCompleted($payment));
        return $payment;
    }

    public function handleWebhook(Request $request): void
    {
        // Usually none for offline; you can implement email parsing/bank webhook here if available
    }

    public function refund(Payment $payment, ?int $amount = null): Payment
    {
        // Manual refund flow; mark & notify
        $payment->status = $amount && $amount < $payment->amount ? 'partially_refunded' : 'refunded';
        $payment->save();
        event(new \App\Events\PaymentRefunded($payment));
        return $payment;
    }
}
