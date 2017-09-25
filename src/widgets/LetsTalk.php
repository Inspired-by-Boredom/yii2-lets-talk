<?php
/**
 * @link https://github.com/Vintage-web-production/yii2-lets-talk
 * @copyright Copyright (c) 2017 Vintage Web Production
 * @license BSD 3-Clause License
 */

namespace vintage\lets\talk\widgets;

use vintage\lets\talk\configurators\ConfiguratorInterface;
use Yii;
use yii\base\Widget;
use yii\di\Instance;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Inflector;

/**
 * Renders links for messengers.
 *
 * @property string $configuratorId
 * @property string $mobileCssClass
 * @property string $wrapperTag
 * @property array $wrapperOptions
 * @property string|false $linkWrapperTag
 * @property array $linkWrapperOptions
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * @since 1.0
 */
class LetsTalk extends Widget
{
    /**
     * @var string
     */
    protected $mobileCssClass = 'visible-xs';
    /**
     * @var string Name of the wrapper tag.
     */
    protected $wrapperTag = 'ul';
    /**
     * @var array HTML options for wrapper tag.
     */
    protected $wrapperOptions = ['class' => 'lets-talk'];
    /**
     * @var false|string Name of the wrapper tag for link.
     * Set `false` value if you don't want using wrapper for link.
     */
    protected $linkWrapperTag = 'li';
    /**
     * @var array HTML options for link wrapper tag.
     */
    protected $linkWrapperOptions = [];

    /**
     * @var string
     */
    private $_configuratorId = 'letsTalk';
    /**
     * @var ConfiguratorInterface
     */
    private $_configurator;


    /**
     * Setter for configurator id.
     *
     * @param string $configuratorId
     */
    public function setConfiguratorId($configuratorId)
    {
        $this->_configuratorId = $configuratorId;
    }

    /**
     * Setter for mobile css class.
     *
     * @param string $mobileCssClass
     */
    public function setMobileCssClass($mobileCssClass)
    {
        $this->mobileCssClass = $mobileCssClass;
    }

    /**
     * Setter for wrapper tag.
     *
     * @param string $wrapperTag
     */
    public function setWrapperTag($wrapperTag)
    {
        $this->wrapperTag = $wrapperTag;
    }

    /**
     * Setter for wrapper options.
     *
     * @param array $wrapperOptions
     */
    public function setWrapperOptions($wrapperOptions)
    {
        $this->wrapperOptions = $wrapperOptions;
    }

    /**
     * Setter for link wrapper tag.
     *
     * @param false|string $linkWrapperTag
     */
    public function setLinkWrapperTag($linkWrapperTag)
    {
        $this->linkWrapperTag = $linkWrapperTag;
    }

    /**
     * Setter for link wrapper options.
     *
     * @param array $linkWrapperOptions
     */
    public function setLinkWrapperOptions($linkWrapperOptions)
    {
        $this->linkWrapperOptions = $linkWrapperOptions;
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->_configurator = Instance::ensure($this->_configuratorId, ConfiguratorInterface::class);
        parent::init();
    }

    /**
     * Creates drive instance.
     *
     * @param array $driveConfig
     * @return \vintage\lets\talk\base\MessengerDriver
     */
    private function createDriver($driveConfig)
    {
        return Yii::createObject(ArrayHelper::merge(
            ['class' => $driveConfig['class']],
            isset($driveConfig['config']) ? $driveConfig['config'] : []
        ));
    }

    /**
     * Build label for driver.
     *
     * @param array $driverConfig
     * @param string $defaultLabel
     * @return string
     */
    protected function buildLabel($driverConfig, $defaultLabel)
    {
        return isset($driverConfig['label'])
            ? $driverConfig['label']
            : $defaultLabel;
    }

    /**
     * Combine global and custom HTML options.
     *
     * @param array $driverConfig
     * @return array
     */
    private function combineOptions($driverConfig)
    {
        $options = isset($driverConfig['options']) ? $driverConfig['options'] : [];

        $globalOptions = $this->_configurator->getOptions();
        if (empty($globalOptions)) {
            return $options;
        }

        if (isset($options['class'])) {
            Html::addCssClass($globalOptions, $options['class']);
            unset($options['class']);
        }

        return ArrayHelper::merge($globalOptions, $options);
    }

    /**
     * Append to options mobile CSS class.
     *
     * @param array $driverConfig
     * @return array
     */
    private function combineOptionsMobile($driverConfig)
    {
        if (isset($driverConfig['options']['class'])) {
            Html::addCssStyle($driverConfig['options']['class'], $this->mobileCssClass);
        } else {
            $driverConfig['options'] = ['class' => $this->mobileCssClass];
        }

        return $this->combineOptions($driverConfig);
    }

    /**
     * Returns array with share links in <a> HTML tag.
     *
     * @return array
     */
    protected function processMessengers()
    {
        $messengers = $this->_configurator->getMessengersConfig();
        $links = [];
        foreach ($messengers as $key => $messenger) {
            if (isset($messenger['class'])) {
                $driver = $this->createDriver($messenger);

                $links[] = Html::a(
                    $this->buildLabel($messenger, Inflector::camel2words($key)),
                    $driver->getLink(),
                    $this->combineOptions($messenger)
                );
                if ($mobileLink = $driver->getMobileLink()) {
                    $links[] = Html::a(
                        $this->buildLabel($messenger, Inflector::camel2words($key)),
                        $mobileLink,
                        $this->combineOptionsMobile($messenger)
                    );
                }
            }
        }
        return $links;
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        echo Html::beginTag($this->wrapperTag, $this->wrapperOptions);

        foreach ($this->processMessengers() as $link) {
            echo ($this->linkWrapperTag !== false)
                ? Html::tag($this->linkWrapperTag, $link, $this->linkWrapperOptions)
                : $link;
        }

        echo Html::endTag($this->wrapperTag);
    }
}
