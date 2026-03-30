<?php

namespace App\Services\Payments\Contracts;

use App\Models\Payment;
use Illuminate\Http\Request;

interface PaymentGatewayInterface
{
    /** Initialize payment with the provider and return a “next_action” (url/secret/instructions). */
    public function createCheckout(Payment $payment, array $options = []): array;

    /** Capture/confirm payment after customer completes provider flow (if applicable). */
    public function capture(Payment $payment, array $payload = []): Payment;

    /** Handle incoming webhooks and update the Payment accordingly. */
    public function handleWebhook(Request $request): void;

    /** Refund full or partial amount (cents). */
    public function refund(Payment $payment, ?int $amount = null): Payment;
}
