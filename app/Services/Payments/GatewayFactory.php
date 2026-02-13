<?php

namespace App\Services\Payments;

use App\Services\Payments\Contracts\PaymentGatewayInterface;
use InvalidArgumentException;

class GatewayFactory
{
    public function make(string $provider): PaymentGatewayInterface
    {
        $gateways = config('payments.gateways');
        if (!isset($gateways[$provider])) {
            throw new InvalidArgumentException("Unsupported payment provider: {$provider}");
        }
        $class = $gateways[$provider]['class'];
        $cfg   = $gateways[$provider];
        return app()->make($class, ['cfg' => $cfg]);
    }
}
