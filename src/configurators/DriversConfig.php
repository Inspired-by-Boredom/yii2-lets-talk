<?php
/**
 * @link https://github.com/Vintage-web-production/yii2-lets-talk
 * @copyright Copyright (c) 2017 Vintage Web Production
 * @license BSD 3-Clause License
 */

namespace vintage\lets\talk\configurators;

use yii\base\Object;
use yii\helpers\ArrayHelper;

/**
 * Configurator for messenger drivers.
 *
 * @property array $messengers
 * @property array $options
 * @property bool $enableSeoOptions
 * @property array $seoOptions
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * @since 1.0
 */
class DriversConfig extends Object implements ConfiguratorInterface
{
    /**
     * @var array
     */
    private $_messengers;
    /**
     * @var array
     */
    private $_options;
    /**
     * @var bool Enable SEO options for share links.
     */
    private $_enableSeoOptions = true;
    /**
     * @var array HTML attributes from this option will be applyed if `enableSeoOptions` is true.
     */
    private $_seoOptions = [];


    /**
     * Setter for messengers.
     *
     * @param array $messengers
     */
    public function setMessengers($messengers)
    {
        $this->_messengers = $messengers;
    }

    /**
     * Setter for options.
     *
     * @param array $options
     */
    public function setOptions($options)
    {
        $this->_options = $options;
    }

    /**
     * Setter for enable seo options.
     *
     * @param bool $enableSeoOptions
     */
    public function setEnableSeoOptions($enableSeoOptions)
    {
        $this->_enableSeoOptions = $enableSeoOptions;
    }

    /**
     * Setter for seo options.
     *
     * @param array $seoOptions
     */
    public function setSeoOptions($seoOptions)
    {
        $this->_seoOptions = $seoOptions;
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        if (empty($this->_seoOptions)) {
            $this->_seoOptions = [
                'target' => '_blank',
                'rel' => 'nofollow',
            ];
        }
    }

    /**
     * @inheritdoc
     */
    public function getMessengersConfig()
    {
        return $this->_messengers;
    }

    /**
     * @inheritdoc
     */
    public function getOptions()
    {
        return $this->_enableSeoOptions
            ? ArrayHelper::merge($this->_options, $this->_seoOptions)
            : $this->_options;
    }
}
