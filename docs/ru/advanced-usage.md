Продвинутое использование
=========================
> Так же читайте [cоветы и фичи](tips-and-tricks.md).

Конфигуратор
------------

#### 1) Опции для настройки

| Опция | Описаник | Тип данных | Стандартное значение |
|-------|----------|------------|----------------------|
|messengers         |Массив с настройками драйверов мессенджеров    |array  |-|
|options            |HTML аттрибуты для ссылки                      |array  |-|
|enableSeoOptions   |Вкл/выкл добавление SEO аттрибутов для ссылки  |bool   |true|
|seoOptions         |SEO аттрибуты для ссылки                       |array  |`['target' => '_blank', 'rel' => 'nofollow']`|

#### 2) Создание своего конфигуратора

Если вы хотите создать свой конфигуратор - вам нужно:
1. Создать класс и унаследовать его от `\yii\base\Object` или `\yii\base\Component`
2. Реализовать метод интерфейса `\vintage\lets\talk\configurators\ConfiguratorInterface`
3. Прописать реальзацию метода

Виджет
------

#### 1) Опции для настройки

| Опция | Описаник | Тип данных | Стандартное значение |
|-------|----------|------------|----------------------|
|configuratorId     |ID компонента-конфигуратора из конфигурации приложения     |string     |-|
|mobileCssClass     |Этот CSS класс будет добавлен к ссылкам которые реализуют интерфейс `\vintage\lets\talk\base\MobileDriver`| string| visible-xs|
|wrapperTag         |Имя HTML тега для обёртки всех ссылок                      |string     |ul|
|wrapperOptions     |HTML аттрибуты для тега-обёртки                            |array      |`['class' => 'social-share']`|
|linkWrapperTag     |Имя HTML тега для обёртки одной ссылки                     |false/string|li|
|linkWrapperOptions |HTML аттрибуты для тега-обёртки ссылки                     |array      |-|

Драйвера социальных сетей
-------------------------

#### 1) Опции для настройки

| Опция | Описаник | Тип данных | Стандартное значение |
|----|----|----|----|
|class   |Полное имя класса драйвера |string |-|
|label   |Лэйбл который будет отображатся в ссылке |string |В качестве лэйбла будет использоватся ключ массива с конфигурацией для этого драйвера|
|options |HTML аттрибуты для ссылки. Если конфигуратор в настройках HTML содержит CSS классы, классы из этого массива будут объедененны с классам из конфигуратора. |array| -|
|config  |Массив с конфирурацией дополнитеьных полей в классе драйвера (если драйвер содержит эти поля) |array |-|

#### 2) Создание собственного драйвера

Для создания драйвера для мессенджера вам необходимо:

1. Создать класс и унаследовать его от `\vintage\lets\talk\base\MessengerDriver`
```php
use vintage\lets\talk\base\MessengerDriver;

class Viber extends MessengerDriver
{
}
```

2. Реализовать метод `getPattern()`

```php
use vintage\lets\talk\base\MessengerDriver;

class Viber extends MessengerDriver
{
    /**
     * @inheritdoc
     */
    protected function getPattern()
    {
    }
}
```

В методе `getLink()` вы должны вернуть строку с шаблоном для ссылки
с ключём `{contact-data}`. Вместо этого ключа будут подстравленны данные с поля `contactData`.

```php
/**
 * @inheritdoc
 */
public function getPattern()
{
    return 'viber://chat?number={contact-data}';
}
```

Если для мессенджера нужно вставить другую сыылку для мобильного устройства
вы должны реализовать интерфейс `\vintage\lets\talk\base\MobileDriver`.

```php
use vintage\lets\talk\base\MessengerDriver;
use vintage\lets\talk\base\MobileDriver;

class Viber extends MessengerDriver implements MobileDriver
{
    /**
     * @inheritdoc
     */
    protected function getPattern()
    {
        return 'viber://chat?number={contact-data}';
    }
    
    /**
     * @inheritdoc
     */
    public function getMobilePattern()
    {
        return 'viber://add?number={contact-data}';
    }
}
```