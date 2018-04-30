<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],



    'facebook' => [
     
       'client_id' => '2025392874396325', //Facebook API
     
       'client_secret' => '13543d9db88c3157478b86f47669c636', //Facebook Secret
     
       'redirect' => 'https://droghers.in/login/facebook/callback',
         
    ],

    'google' => [
     
       'client_id' => '478637737516-nb0m8b9n65v0ea5kv35qn7cbovvvmtv2.apps.googleusercontent.com', //GOOGLE API
     
       'client_secret' => 'FCajrcKfE_9QsCn-LafB9m38', //GOOGLE Secret
     
       'redirect' => 'https://droghers.in/login/google/callback',
         
    ]

];
