<?php

namespace App\Providers;

use \App\Events\PaymentRefunded;
use \App\Listeners\SendPaymentRefundedNotification;
use App\Events\PaymentCompleted;
use App\Listeners\SendPaymentCompletedNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        PaymentCompleted::class => [
            SendPaymentCompletedNotification::class,
        ],
        PaymentRefunded::class => [
            SendPaymentRefundedNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        parent::boot();
    }
}
