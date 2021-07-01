<?php

namespace App\Providers;

use App\Models\Equipment;
use App\Models\Portfolio;
use App\Models\Process;
use App\Observers\EquipmentObserver;
use App\Observers\PortfolioObserver;
use App\Observers\ProcessObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

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
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot(): void
    {
        Process::observe(ProcessObserver::class);
        Equipment::observe(EquipmentObserver::class);
        Portfolio::observe(PortfolioObserver::class);
    }
}
