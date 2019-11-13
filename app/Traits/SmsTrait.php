<?php


namespace App\Traits;

use Illuminate\Support\Arr;
use Overtrue\EasySms\EasySms;

/**
 * Class SmsTrait
 * 短信
 * @package App\Traits
 * @version 1.0.0
 * @author wangzhihao zhihao.wang@extremevision.com.cn
 */
trait SmsTrait
{

    /**
     * 发送短信
     * 发送短信
     * @param $mobile
     * @param $content
     * @author 王志豪
     */
    public function send($mobile, $content)
    {
        app(EasySms::class)->send($mobile, [
            'content' => $content,
        ]);
    }

}
