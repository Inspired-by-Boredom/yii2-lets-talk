<?php
/**
 * @link https://github.com/Vintage-web-production/yii2-lets-talk
 * @copyright Copyright (c) 2017 Vintage Web Production
 * @license BSD 3-Clause License
 */

namespace vintage\lets\talk\drivers;

use vintage\lets\talk\base\MessengerDriver;

/**
 * Driver for Skype.
 *
 * On desktop (Windows) with installed application will be opened chat/call in application.
 * On mobile devices with installed application will be opened just application.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * @since 1.0
 */
class Skype extends MessengerDriver
{
    /**
     * @var string Nickname from Skype.
     */
    protected $contactData;

    /**
     * @var bool
     */
    private $_isCall = false;


    /**
     * Setter for is call.
     *
     * @param bool $isCall
     */
    public function setIsCall($isCall)
    {
        $this->_isCall = $isCall;
    }

    /**
     * Returns pattern.
     *
     * @return string
     */
    protected function getPattern()
    {
        return $this->_isCall
            ? 'skype:{contact-data}?call'
            : 'skype:{contact-data}?chat';
    }
}
