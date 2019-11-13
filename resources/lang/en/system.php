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

    'internal_error' => 'Internal system error.',
    'database_error' => 'System database error.',
    'data_error' => 'System data does not exist.',
    'route_not_exists' => 'System route does not exist.',
    'route_method_not_exists' => 'System route method does not exist.',
    'authentication_failure' => 'User authentication failure.',
    'unauthenticated' => 'User unauthenticated.',
    'successful_operation' => 'Successful operation.',
    'verification_code_error' => 'Verification code error.',
    'old_email_error' => 'Old email error.',
    'old_password_error' => 'Old password error.',

    'sms' => [
        'register' => 'Check code: :code, you are registering your phone, please enter it in :expire minutes.',
        'update_mobile' => 'Check code: :code, you are in the process of mobile phone authentication, please enter in :expire minutes.',
        'update_new_mobile' => 'Check code: :code, you are in the mobile phone binding, please enter in :expire minutes.',
    ],

    'email' => [
        'bind_email' => [
            'title' => 'Extreme Market Developer Platform - Mailbox Binding Mail',
        ],
        'update_email' => [
            'title' => 'Extreme Market Developer Platform - Mailbox Update Mail',
        ],
        'update_mobile' => [
            'title' => 'Extreme Market Developer Platform - Mobile Number Update Mail',
        ]
    ]

];
