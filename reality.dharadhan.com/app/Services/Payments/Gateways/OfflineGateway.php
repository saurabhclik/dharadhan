<?php

namespace App\Services\Payments\Gateways;

use App\Exceptions\PaymentException;
use App\Models\Payment;
use App\Services\Payments\Contracts\PaymentGatewayInterface;
use Illuminate\Http\Request;

class OfflineGateway implements PaymentGatewayInterface
{
    public function createCheckout(Payment $payment, array $options = []): array
    {
        try {
            // Mark the payment as pending until admin confirms
            $payment->status = 'pending';
            $payment->provider_ref = 'offline-' . uniqid();
            $payment->meta = array_merge($payment->meta ?? [], [
                'instructions' => $this->instructions($payment),
            ]);
            $payment->save();
            // Clear session shipment data
            session()->forget('shipment_data');
            return [
                'type' => 'redirect',
                'url' => route('payments.success', ['publicId' => $payment->public_id]),
            ];
        } catch (\Throwable $e) {
            throw new PaymentException(
                "Failed to create offline payment",
                ['provider' => 'offline', 'error' => $e->getMessage()],
                500,
                $e
            );
        }
    }

    public function capture(Payment $payment, array $payload = []): Payment
    {
        // Not needed for Checkout Session (webhook will confirm). Return current state.
        return $payment;
    }

    public function handleWebhook(Request $request): void
    {
        // Offline payments do not use webhooks.
        // Admin updates status manually in dashboard.
    }

    public function refund(Payment $payment, ?int $amount = null): Payment
    {
        // Offline payments can be refunded manually by admin.
        return $payment;
    }

    private function instructions(Payment $payment): string
    {
        $amount = number_format($payment->amount, 2);
        return <<<EOT
Please transfer the amount of {$payment->currency} {$amount}
to the following bank account:

Bank: Example Bank
Account Number: 123456789
IFSC: EXAMPL0001

Use reference: {$payment->public_id}

Once payment is made, upload your receipt in your account or contact support.
EOT;
    }
}
