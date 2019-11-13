<?php
return [
    // HTTP 请求的超时时间（秒）
    'timeout' => 5.0,

    // 默认发送配置
    'default' => [
        // 网关调用策略，默认：顺序调用
        'strategy' => \Overtrue\EasySms\Strategies\OrderStrategy::class,

        // 默认可用的发送网关
        'gateways' => [
            'huyi',
        ],
    ],
    // 可用的网关配置
    'gateways' => [
        'errorlog' => [
            'file' => storage_path('logs/sms.log'),//日志相对路径
        ],
        'huyi' => [
            'api_id' => env('HUYI_API_ID', ''),
            'api_key' =>  env('HUYI_API_KEY', ''),
        ],
    ],
];
