<?php
/**
 * @link https://github.com/Vintage-web-production/yii2-lets-talk
 * @copyright Copyright (c) 2017 Vintage Web Production
 * @license BSD 3-Clause License
 */

namespace vintage\lets\talk\base;

use ReflectionClass;
use yii\base\Object;

/**
 * Base class for drivers.
 *
 * @property string $contactData
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * @since 1.0
 */
abstract class MessengerDriver extends Object
{
    /**
     * @var string
     */
    protected $contactData;


    /**
     * Setter for contact data.
     *
     * @param string $contactData
     */
    public function setContactData($contactData)
    {
        $this->contactData = $contactData;
    }

    /**
     * @param string $pattern
     * @return string
     */
    private function parsePattern($pattern)
    {
        return strtr($pattern, ['{contact-data}' => $this->contactData]);
    }

    /**
     * Returns link.
     *
     * @return string
     */
    public function getLink()
    {
        return $this->parsePattern($this->getPattern());
    }

    /**
     * Returns link for mobile devices.
     *
     * @return string|false
     */
    public function getMobileLink()
    {
        if (is_subclass_of(static::class, MobileDriver::class)) {
            return $this->parsePattern(static::getMobilePattern());
        }
        return false;
    }

    /**
     * Method should returns pattern with '{contact-data}' token.
     *
     * @return string
     */
    abstract protected function getPattern();
}
