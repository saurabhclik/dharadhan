<?php

namespace App\Http\Controllers;

use App\Services\Payments\PaymentManager;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function handleWebhook(string $provider, Request $request)
    {
        app(PaymentManager::class)->handleWebhook($provider, $request);
        return response()->json(['ok' => true]);
    }
}
