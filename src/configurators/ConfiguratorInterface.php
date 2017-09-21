<?php
/**
 * @link https://github.com/Vintage-web-production/yii2-lets-talk
 * @copyright Copyright (c) 2017 Vintage Web Production
 * @license BSD 3-Clause License
 */

namespace vintage\lets\talk\configurators;

/**
 * Interface for configurators of messengers drivers.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * @since 1.0
 */
interface ConfiguratorInterface
{
    /**
     * This method should returns a array with config
     * for messengers drivers.
     *
     * @return array
     */
    public function getMessengersConfig();

    /**
     * This method should returns a array with HTML
     * options for share links.
     *
     * @return array
     */
    public function getOptions();
}
