Tips and tricks
===============

Using HTML content instead text labels
--------------------------------------

```php
'components' => [
    // ...
    'letsTalk' => [
        'class' => \vintage\lets\talk\configurators\DriversConfig::class,
        'messengers' => [
            'telegram' => [
                'class' => \vintage\lets\talk\drivers\Telegram::class,
                'config' => [
                    'contactData' => '', // nickname here
                ],
                'label' => \yii\helpers\Html::tag('i', '', ['class' => 'icon-tg']),
            ],
        ],
    ],
],
```

Translate text labels
---------------------

```php
'components' => [
    // ...
    'letsTalk' => [
        'class' => \vintage\lets\talk\configurators\DriversConfig::class,
        'messengers' => [
            'telegram' => [
                'class' => \vintage\lets\talk\drivers\Telegram::class,
                'config' => [
                    'contactData' => '', // nickname here
                ],
                'label' => \Yii::t('front', 'Telegram'),
            ],
        ],
    ],
],
```

Using of different social networks in different pages
-----------------------------------------------------

Configure several configurator components in app config

```php
'components' => [
    // ...
    'letsTalkFooter' => [
        'class' => \vintage\lets\talk\configurators\DriversConfig::class,
        'messengers' => [
            'telegram' => [
                'class' => \vintage\lets\talk\drivers\Telegram::class,
                'config' => [
                    'contactData' => '', // nickname here
                ],
            ],
            'viber' => [
                'class' => \vintage\lets\talk\drivers\Viber::class,
                'config' => [
                    'contactData' => '', // phone number here
                ],
            ],
            'whatsApp' => [
                'class' => \vintage\lets\talk\drivers\WhatsApp::class,
                'config' => [
                    'contactData' => '', // phone number here
                ],
            ],
        ],
    ],
    'letsTalkSupportPage', => [
        'class' => \vintage\lets\talk\configurators\DriversConfig::class,
        'messengers' => [
            'skypeChat' => [
                'class' => \vintage\lets\talk\drivers\Skype::class,
                'config' => [
                    'contactData' => '', // nickname here
                ],
            ],
            'skypeCall' => [
                'class' => \vintage\lets\talk\drivers\Skype::class,
                'config' => [
                    'contactData' => '', // nickname here
                    'isCall' => true,
                ],
            ],
        ],
    ],
],
```

Call widget in view files

```php
// main.php layout file

<?= \vintage\lets\talk\widgets\LetsTalk::widget([
    'configuratorId' => 'letsTalkFooter', // Configurator component ID
]); ?>
```

```php
// support.php view file

<?= \vintage\lets\talk\widgets\LetsTalk::widget([
    'configuratorId' => 'letsTalkSupportPage', // Configurator component ID
]); ?>
```