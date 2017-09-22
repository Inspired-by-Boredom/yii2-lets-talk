<?php
/**
 * @link https://github.com/Vintage-web-production/yii2-lets-talk
 * @copyright Copyright (c) 2017 Vintage Web Production
 * @license BSD 3-Clause License
 */

namespace vintage\lets\talk\drivers;

use vintage\lets\talk\base\MessengerDriver;
use vintage\lets\talk\base\MobileDriver;

/**
 * Driver for Viber.
 *
 * On desktop (Windows) with installed application will be opened chat in application.
 * On mobile devices with installed application will be opened chat in application.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * @since 1.0
 */
class Viber extends MessengerDriver implements MobileDriver
{
    /**
     * @var string Phone number from Viber.
     */
    protected $contactData;


    /**
     * Returns pattern.
     *
     * @return string
     */
    protected function getPattern()
    {
        return 'viber://chat?number={contact-data}';
    }

    /**
     * Returns pattern for mobile devices.
     *
     * @return string
     */
    public function getMobilePattern()
    {
        return 'viber://add?number={contact-data}';
    }
}
