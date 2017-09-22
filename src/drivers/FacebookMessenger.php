<?php
/**
 * @link https://github.com/Vintage-web-production/yii2-lets-talk
 * @copyright Copyright (c) 2017 Vintage Web Production
 * @license BSD 3-Clause License
 */

namespace vintage\lets\talk\drivers;

use vintage\lets\talk\base\MessengerDriver;

/**
 * Driver for Facebook Messenger.
 *
 * On desktop (Windows, Linux, Mac OS) will be opened in browser.
 * On mobile devices with installed application will be opened chat in application.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class FacebookMessenger extends MessengerDriver
{
    /**
     * @var string Nickname from Facebook.
     */
    protected $contactData;


    /**
     * Returns pattern.
     *
     * @return string
     */
    protected function getPattern()
    {
        return 'https://m.me/{contact-data}';
    }
}
