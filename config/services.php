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
    'google' => [
        'client_id'     => '546105956464-q2dnpha21qs3flp3gviuvcm2t1dbitin.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect'      => 'http://127.0.0.1:8000/google/callback',
    ],
    'facebook' => [
        'client_id'     => '6421755684508091',
        'client_secret' => '465a0ccf9d7a24fcfe28401cf66c0b69',
        'redirect'      => 'http://127.0.0.1:8000/facebook/callback',
    ],
    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

];
