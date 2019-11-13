<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'internal_error' => '系统内部错误。',
    'database_error' => '系统数据库错误。',
    'data_error' => '系统数据不存在。',
    'route_not_exists' => '系统路由不存在。',
    'route_method_not_exists' => '系统路由方法不存在。',
    'authentication_failure' => '用户鉴权失败。',
    'unauthenticated' => '用户未鉴权。',
    'successful_operation' => '操作成功。',
    'verification_code_error' => '验证码有误。',
    'old_email_error' => '旧电子邮箱错误。',
    'old_password_error' => '旧密码错误。',

    'sms' => [
        'register' => '校验码：:code，你正在进行手机注册，请在:expire分钟内输入。',
        'update_mobile' => '校验码：:code，你正在进行手机身份验证，请在:expire分钟内输入。',
        'update_new_mobile' => '校验码：:code，你正在进行手机绑定，请在:expire分钟内输入。',
    ],

    'email' => [
        'bind_email' => [
            'title' => '极市开发者平台-邮箱绑定邮件',
        ],
        'update_email' => [
            'title' => '极市开发者平台-邮箱更新邮件',
        ],
        'update_mobile' => [
            'title' => '极市开发者平台-手机号更新邮件',
        ]
    ]

];
