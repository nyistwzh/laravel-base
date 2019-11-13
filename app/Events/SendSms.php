<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class SendSms
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $mobile;

    public $content;

    /**
     * Create a new event instance.
     *
     * @param $mobile
     * @param $content
     *
     * @return void
     */
    public function __construct($mobile, $content)
    {
        $this->mobile = $mobile;
        $this->content = $content;
    }
}
