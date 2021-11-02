<?php
return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'paypal'=>[
        'base_uri'=>env('PAYPAL_BASE_URI'),
        'client_id'=>env('PAYPAL_CLIENT_ID'),
        'client_secret'=>env('PAYPAL_CLIENT_SECRET'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    
    'google' => [
        'client_id' => '812206522477-jl0d771adrocm4eae0jivvl6k35sq91c.apps.googleusercontent.com',
        'client_secret' => 'fpwSJq-Urtiajq9W2m8dHjgO',
        'redirect' =>'https://zfollowers.com/login/google/callback',
    ],
    
    'facebook' => [
        'client_id' => '968932400621841',
        'client_secret' => '3949ea29d5550b5a0a06657e1ac0277b',
        'redirect' =>'https://localhost:8000/login/google/callback',
    ],

];
