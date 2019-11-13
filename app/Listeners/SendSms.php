<?php

namespace App\Listeners;

use App\Events\SendSms as SendSmsEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Traits\SmsTrait;

class SendSms implements ShouldQueue
{

    use SmsTrait, Dispatchable, InteractsWithQueue, SerializesModels, Queueable;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * 发送短信
     * 发送短信
     * @param  SendSmsEvent  $event
     * @throws \Exception
     * @author 王志豪
     */
    public function handle(SendSmsEvent $event)
    {
        $this->send($event->mobile, $event->content);
    }
}
