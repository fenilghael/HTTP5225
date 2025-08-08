<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The associations between events and their listeners in the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Set up any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Decide whether events and listeners should be detected automatically.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
} 