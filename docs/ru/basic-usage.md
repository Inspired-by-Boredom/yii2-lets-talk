Базовое использование
=====================
Если вы хотите использовать все возможности - прочтите [продвинутуе использование](advanced-usage.md)
и [cоветы и фичи](tips-and-tricks.md).

Настройка драйверов социальных сетей в конфигурации приложения
--------------------------------------------------------------

```php
'components' => [
    // ...
    'letsTalk' => [
        'class' => \vintage\lets\talk\configurators\DriversConfig::class,
        'messengers' => [
            'skype' => [
                'class' => \vintage\lets\talk\drivers\Skype::class,
                'config' => [
                    'contactData' => '', // nickname here
                    'isCall' => true,
                ],
            ],
            'snapchat' => [
                'class' => \vintage\lets\talk\drivers\Snapchat::class,
                'config' => [
                    'contactData' => '', // nickname here
                ],
            ],
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
],
```

Вызов виджета в файле вида
--------------------------

```php
<?= \vintage\lets\talk\widgets\LetsTalk::widget(); ?>
```