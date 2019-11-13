<?php

/*
 * What php team is that is 'one thing, a team, work together'
 */

return [
    // 接口风格
    'interface_style' => env('BACK_SYSTEM_INTERFACE_STYLE', 'restful-api'),
    // 分页参数
    'paging' => [
        'default_per_page' => env('BACK_SYSTEM_PAGING_DEFAULT_PER_PAGE', 10),
    ],
    // 短信
    'sms' => [
        // 注册短信
        'register' => [
            'expire' => env('BACK_SYSTEM_SMS_REGISTER_EXPIRE', 300),
            'message_key' => env('BACK_SYSTEM_SMS_REGISTER_MESSAGE_KEY', 'system.sms.register'),
        ],
        // 更新手机号旧手机短信
        'update_mobile' => [
            'expire' => env('BACK_SYSTEM_SMS_UPDATE_MOBILE_EXPIRE', 300),
            'message_key' => env('BACK_SYSTEM_SMS_UPDATE_MOBILE_MESSAGE_KEY', 'system.sms.update_mobile'),
        ],
        // 更新手机号新手机短信
        'update_new_mobile' => [
            'expire' => env('BACK_SYSTEM_SMS_UPDATE_NEW_MOBILE_EXPIRE', 300),
            'message_key' => env('BACK_SYSTEM_SMS_UPDATE_NEW_MOBILE_MESSAGE_KEY', 'system.sms.update_new_mobile'),
        ],
    ],
    // 邮件
    'email' => [
        // 绑定邮箱
        'bind_email' => [
            'expire' => env('BACK_SYSTEM_EMAIL_BIND_EMAIL_EXPIRE', 300),
            'template' => env('BACK_SYSTEM_EMAIL_BIND_EMAIL_TEMPLATE', 'cvmart_bind_email'),
        ],
        // 更新邮箱
        'update_email' => [
            'expire' => env('BACK_SYSTEM_EMAIL_UPDATE_EMAIL_EXPIRE', 300),
            'template' => env('BACK_SYSTEM_EMAIL_UPDATE_EMAIL_TEMPLATE', 'cvmart_update_email'),
        ],
        // 更新手机号
        'update_mobile' => [
            'expire' => env('BACK_SYSTEM_EMAIL_UPDATE_MOBILE_EXPIRE', 300),
            'template' => env('BACK_SYSTEM_EMAIL_UPDATE_MOBILE_TEMPLATE', 'cvmart_update_mobile'),
        ],
    ],
    // 头像
    'avatar' => [
        'default' => env('BACK_SYSTEM_AVATAR_DEFAULT', '/storage/default/avatar.jpg'),
        'save_path' => env('BACK_SYSTEM_AVATAR_SAVE_PATH', '/avatar/'),
    ],
    // 手持证件照
    'licensed_photo' => [
        'save_path' => env('BACK_SYSTEM_LICENSED_PHOTO_SAVE_PATH', '/licensed-photo/'),
    ],
    // 奖项证件照
    'award_prove' => [
        'save_path' => env('BACK_SYSTEM_AWARD_PICTURE_SAVE_PATH', '/award-picture/'),
    ],
];
