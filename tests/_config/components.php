<?php

return [
    'letsTalk' => [
        'class' => \vintage\lets\talk\configurators\DriversConfig::class,
        'messengers' => [
            'skype' => [
                'class' => \vintage\lets\talk\drivers\Skype::class,
                'config' => [
                    'contactData' => 'nickname',
                ],
            ],
            'snapchat' => [
                'class' => \vintage\lets\talk\drivers\Snapchat::class,
                'config' => [
                    'contactData' => 'nickname',
                ],
            ],
            'telegram' => [
                'class' => \vintage\lets\talk\drivers\Telegram::class,
                'config' => [
                    'contactData' => 'nickname',
                ],
            ],
            'viber' => [
                'class' => \vintage\lets\talk\drivers\Viber::class,
                'config' => [
                    'contactData' => 'nickname',
                ],
            ],
            'whatsApp' => [
                'class' => \vintage\lets\talk\drivers\WhatsApp::class,
                'config' => [
                    'contactData' => 'nickname',
                ],
            ],
            'facebookMessanger' => [
                'class' => \vintage\lets\talk\drivers\FacebookMessenger::class,
                'config' => [
                    'contactData' => 'nickname',
                ],
            ],
        ],
    ],
];
