<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Events\SubscriptionCreated;
use App\Events\SubscriptionDeleted;
use App\Listeners\NotificationSubscription;
use Illuminate\Support\Facades\Event;

class AppServiceProvider extends ServiceProvider
{
    protected $listen = [
        SubscriptionCreated::class => [
            [NotificationOnSubscription::class, 'handleSubscriptionCreated'],
        ],
        SubscriptionDeleted::class => [
            [NotificationOnSubscription::class, 'handleSubscriptionDeleted'],
        ],
    ];
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
