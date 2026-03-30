<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Payments\GatewayFactory;
use App\Services\Payments\PaymentManager;

class PaymentServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(GatewayFactory::class, fn() => new GatewayFactory());
        $this->app->singleton(PaymentManager::class, fn($app) => new PaymentManager($app->make(GatewayFactory::class)));
    }
}
