<?php
return [
    //Environment=> test/production
    //https://github.com/Edujugon/laravel-google-ads/issues/15
    // https://github.com/keithslater
    'env' => 'test',
    //Google Ads
    'production' => [
        'developerToken' => "zW4xScLTsa5mwn-hSa7u7Q",
        'clientCustomerId' => "199-359-6438",
        'userAgent' => "LARADA SCIENCES",
        'clientId' => "448998543617-5b5b2l7tu0emlh1bs0oer78n0pke1hl4.apps.googleusercontent.com",
        'clientSecret' => "7Y3W9H-JBEbG922yj1zhITPi",
        'refreshToken' => "1/ITL2Qtl-x4kk0__oznQnkcBTgMl-j0bRFANK5Mq8DKA"
    ],
    'production-not' => [
        'developerToken' => "Un4RW8m0tQFwqJ2doBFj9w",
        'clientCustomerId' => "199-359-6438",
        'userAgent' => "LARADA SCIENCES",
        'clientId' => "448998543617-5b5b2l7tu0emlh1bs0oer78n0pke1hl4.apps.googleusercontent.com",
        'clientSecret' => "7Y3W9H-JBEbG922yj1zhITPi",
        'refreshToken' => "1/ITL2Qtl-x4kk0__oznQnkcBTgMl-j0bRFANK5Mq8DKA"
    ],
    'test' => [
        'developerToken' => "zW4xScLTsa5mwn-hSa7u7Q",
        'clientCustomerId' => "199-359-6438",
        'userAgent' => "LARADA SCIENCES",
        'clientId' => "448998543617-5b5b2l7tu0emlh1bs0oer78n0pke1hl4.apps.googleusercontent.com",
        'clientSecret' => "7Y3W9H-JBEbG922yj1zhITPi",
        'refreshToken' => "1/ITL2Qtl-x4kk0__oznQnkcBTgMl-j0bRFANK5Mq8DKA"
    ],
    'oAuth2' => [
        'authorizationUri' => 'https://accounts.google.com/o/oauth2/v2/auth',
        'redirectUri' => 'urn:ietf:wg:oauth:2.0:oob',
        'tokenCredentialUri' => 'https://www.googleapis.com/oauth2/v4/token',
        'scope' => 'https://www.googleapis.com/auth/adwords'
    ]
];

