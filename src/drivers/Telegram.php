<?php
/**
 * @link https://github.com/Vintage-web-production/yii2-lets-talk
 * @copyright Copyright (c) 2017 Vintage Web Production
 * @license BSD 3-Clause License
 */

namespace vintage\lets\talk\drivers;

use vintage\lets\talk\base\MessengerDriver;

/**
 * Driver for Telegram.
 *
 * On desktop (Windows, Linux, Mas OS) with installed application will be opened chat
 * in application.
 * On mobile devices with installed application will be opened chat in application.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * @since 1.0
 */
class Telegram extends MessengerDriver
{
    /**
     * @var string Nickname from Telegram.
     */
    protected $contactData;


    /**
     * Returns pattern.
     *
     * @return string
     */
    protected function getPattern()
    {
        return 'tg://resolve?domain={contact-data}';
    }
}
