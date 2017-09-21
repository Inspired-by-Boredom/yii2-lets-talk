Advanced usage
==============
> Also read [tips and tricks](tips-and-tricks.md) guide.

Configurator
------------

#### 1) Configuration options

| Option | Description | Type | Default |
|--------|-------------|------|---------|
|messengers         |Array with configuration for messenger drivers     |array  |-|
|options            |HTML options for links                             |array  |-|
|enableSeoOptions   |Enable/disable appending of SEO options to links   |bool   |true|
|seoOptions         |SEO options for links                              |array  |`['target' => '_blank', 'rel' => 'nofollow']`|

#### 2) Create my configurator component

If you want to create your configurator, you should to:
1. Create class end inherit it from `\yii\base\Object` or `\yii\base\Component`
2. Implement the `\vintage\lets\talk\configurators\ConfiguratorInterface` interface
3. And implement methods from this interface

LetsTalk widget
---------------

#### 1) Configuration options

| Option | Description | Type | Default |
|--------|-------------|------|---------|
|configuratorId     |ID of configurator component from app config   |string     |-|
|mobileCssClass     |This CSS class will be added to social networks who implements `\vintage\lets\talk\base\MobileDriver` interface| string| visible-xs|
|wrapperTag         |Wrapper HTML tag name for all links            |string     |ul|
|wrapperOptions     |HTML options for wrapper tag                   |array      |`['class' => 'social-share']`|
|linkWrapperTag     |Wrapper HTML tag name for one link             |false/string|li|
|linkWrapperOptions |HTML options for link wrapper tag              |array      |-|

Messenger drivers
-----------------

#### 1) Configuration options

| Option | Description | Type | Default |
|--------|-------------|------|---------|
|class  |Class name of driver|string|-|
|label  |Label for displaying in link tag|string|By default widget will be displaying key of array with driver config|
|options|HTML options for link. CSS class will be appended to classes from configurator options. Other options will be overridden.|array|-|
|config |Array with configuration for class fields of driver (if driver has custom fields for configuration)|array|-|

#### 2) Create my messenger driver

For creating of driver for social network you should to:

1. Create class and inherit it from `\vintage\lets\talk\base\MessengerDriver`
```php
use vintage\lets\talk\base\MessengerDriver;

class Viber extends MessengerDriver
{
}
```

2. And implement method `getPattern()`

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

In `getLink()` method you should assign a string with pattern of link
with `{contact-data}` token. This token will be replaced by data from `contactData` field.

```php
/**
 * @inheritdoc
 */
public function getPattern()
{
    return 'viber://chat?number={contact-data}';
}
```

If your driver has another link for mobile devices
you should to implement `\vintage\lets\talk\base\MobileDriver` interface.

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
    
    public function getMobilePattern()
    {
        return 'viber://add?number={contact-data}';
    }
}
```