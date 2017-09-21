<?php
/**
 * @link https://github.com/Vintage-web-production/yii2-lets-talk
 * @copyright Copyright (c) 2017 Vintage Web Production
 * @license BSD 3-Clause License
 */

namespace vintage\lets\talk\base;

/**
 * Interface for messengers with mobile version of pattern.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * @since 1.0
 */
interface MobileDriver
{
    /**
     * Method should returns pattern with '{contact-data}' token
     * for mobile devices.
     *
     * @return string
     */
    public function getMobilePattern();
}
