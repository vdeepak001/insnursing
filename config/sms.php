<?php

return [

    'username' => env('SMS_USERNAME', 'healthcareskill'),

    'password' => env('SMS_PASSWORD', 'Raja_uday@2025'),

    'sender_id' => env('SMS_SENDER_ID', 'INURSE'),

    'dlt_entity_id' => env('SMS_DLT_ENTITY_ID', '1701158072845020034'),

    'api_url' => env('SMS_API_URL', 'https://www.smsjust.com/blank/sms/user/urlsms.php'),

    /*
    |--------------------------------------------------------------------------
    | DLT template IDs (shared OTP template for forgot password + CNE tests)
    |--------------------------------------------------------------------------
    */
    'templates' => [
        'otp' => env('SMS_TEMPLATE_OTP', '1707171264502105055'),
        'registration' => env('SMS_TEMPLATE_REGISTRATION', '1707171264514580828'),
        'purchase' => env('SMS_TEMPLATE_PURCHASE', '1707171264514580828'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Message bodies must match registered DLT templates exactly.
    |--------------------------------------------------------------------------
    */
    'messages' => [
        'otp' => 'Dear User, your OTP {otp} for FORGOT PASSWORD. Valid for 10 minutes. DO NOT SHARE. Call: +91-94452 56977 / 9445296977- IMPETUS',
        'registration' => 'Dear User, your IHS Nursing registration is successful. Password {password}. IHS ID {ihs_id}. Call: +91-94452 56977 / 9445296977-IHSNURSING',
        'purchase' => 'Dear User, you have successfully purchased online test. Your package details {package}. Call: +91-94452 56977 / 9445296977-IHSNURSING',
    ],

];
