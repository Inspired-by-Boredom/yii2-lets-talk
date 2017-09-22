<?php
/**
 * @link https://github.com/Vintage-web-production/yii2-lets-talk
 * @copyright Copyright (c) 2017 Vintage Web Production
 * @license BSD 3-Clause License
 */

namespace vintage\lets\talk\drivers;

use vintage\lets\talk\base\MessengerDriver;

/**
 * Driver for WhatsApp.
 *
 * On desktop (Windows) with installed application will be opened chat in application.
 * On mobile devices with installed application will be opened chat in application.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * @since 1.0
 */
class WhatsApp extends MessengerDriver
{
    /**
     * @var string Phone number from WhatsApp.
     */
    protected $contactData;


    /**
     * Returns pattern.
     *
     * @return string
     */
    protected function getPattern()
    {
        return 'whatsapp://send?phone={contact-data}';
    }
}
