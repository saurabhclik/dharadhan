<?php

use App\Services\Payments\Gateways\ETransferGateway;
use App\Services\Payments\Gateways\PayPalGateway;
use App\Services\Payments\Gateways\StripeGateway;
use App\Services\Payments\Gateways\OfflineGateway;

return [
    'default_currency' => env('DEFAULT_CURRENCY', 'USD'),
    'gateways' => [
        'stripe' => [
            'name' => 'Stripe (Card)',
            'class' => StripeGateway::class,
            'key' => env('STRIPE_KEY'),
            'secret' => env('STRIPE_SECRET'),
            'webhook_secret' => env('STRIPE_WEBHOOK_SECRET'),
            'logo' => '/images/social.png',
            'enabled' => true,
            'default' => true
        ],
        'paypal' => [
            'name' => 'PayPal',
            'class' => PayPalGateway::class,
            'client_id' => env('PAYPAL_CLIENT_ID'),
            'client_secret' => env('PAYPAL_CLIENT_SECRET'),
            'mode' => env('PAYPAL_MODE', 'sandbox'),
            'webhook_id' => env('PAYPAL_WEBHOOK_ID'),
            'logo' => '/images/pp_cc_mark_111x69.jpg',
            'enabled' => false,
            'default' => false
        ],
        'etransfer' => [
            'name' => 'E-Transfer',
            'class' => ETransferGateway::class,
            'instructions' => env('ETRANSFER_INSTRUCTIONS'),
            'logo' => '/images/Interac_e-Transfer_logo.png',
            'enabled' => false,
            'default' => false
        ],
        'offline' => [
            'name' => 'Bank Transfer',
            'class' => OfflineGateway::class,
            'enabled' => true,
            'default' => false,
            'logo' => '/images/bank-transfer.png',
        ],
    ],
];
