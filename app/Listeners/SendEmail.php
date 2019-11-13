<?php

namespace App\Listeners;

use App\Events\SendEmail as SendEmailEvent;
use App\Traits\RedisTrait;
use App\Traits\SmsTrait;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;

class SendEmail implements ShouldQueue
{

    use SmsTrait, RedisTrait, Dispatchable, InteractsWithQueue, SerializesModels, Queueable;

    /**
     * Create the event listener.
     *
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * 发送邮件
     * 发送邮件
     * @param  SendEmailEvent  $event
     * @throws \Exception
     * @author 王志豪
     */
    public function handle(SendEmailEvent $event)
    {
        Mail::raw($event->content, function (Message $message) use ($event) {
            $message->to($event->email);
        });
    }
}
