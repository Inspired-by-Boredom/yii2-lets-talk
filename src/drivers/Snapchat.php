<?php
/**
 * @link https://github.com/Vintage-web-production/yii2-lets-talk
 * @copyright Copyright (c) 2017 Vintage Web Production
 * @license BSD 3-Clause License
 */

namespace vintage\lets\talk\drivers;

use vintage\lets\talk\base\MessengerDriver;

/**
 * Driver for Snapchat.
 *
 * On desktop (Windows, Linux, Mas OS) will be opened in browser.
 * On mobile devices with installed application will be opened contact in application.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * @since 1.0
 */
class Snapchat extends MessengerDriver
{
    /**
     * Returns pattern.
     *
     * @return string
     */
    protected function getPattern()
    {
        return 'https://www.snapchat.com/add/{contact-data}';
    }
}
