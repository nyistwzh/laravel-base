<?php

/*
 * What php team is that is 'one thing, a team, work together'
 */

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        // 监听dingo响应事件
        'Dingo\Api\Event\ResponseWasMorphed' => [
            'App\Listeners\AddPaginationLinksToResponse',
        ],
        'App\Events\SendSms' => [
            'App\Listeners\SendSms',
        ],
        'App\Events\SendEmail' => [
            'App\Listeners\SendEmail',
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot()
    {
        parent::boot();
    }
}
