<?php
/**
 * @link https://github.com/Vintage-web-production/yii2-lets-talk
 * @copyright Copyright (c) 2017 Vintage Web Production
 * @license BSD 3-Clause License
 */

namespace vintage\lets\talk\tests\unit\widgets;

use vintage\lets\talk\widgets\LetsTalk;
use yii\base\InvalidConfigException;

/**
 * Test case for [[\vintage\lets\talk\widgets\LetsTalk]].
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * @since 1.0
 */
class LetsTalkTest extends \Codeception\Test\Unit
{
    public $skype = 'skype:nickname?chat';
    public $snapchat = 'https://www.snapchat.com/add/nickname';
    public $telegram = 'tg://resolve?domain=nickname';
    public $viber = 'viber://chat?number=nickname';
    public $viberMobile = 'viber://add?number=nickname';
    public $whatsapp = 'whatsapp://send?phone=nickname';
    public $facebookMessanger = 'https://m.me/nickname';


    public function testRun()
    {
        $widget = new LetsTalk();
        ob_start();
        $widget->run();
        $actualHTML = ob_get_contents();
        ob_end_clean();

        $expectedHTML =
            "<ul class=\"lets-talk\">"
            . "<li><a href=\"$this->skype\" rel=\"nofollow\" target=\"_blank\">Skype</a></li>"
            . "<li><a href=\"$this->snapchat\" rel=\"nofollow\" target=\"_blank\">Snapchat</a></li>"
            . "<li><a href=\"$this->telegram\" rel=\"nofollow\" target=\"_blank\">Telegram</a></li>"
            . "<li><a href=\"$this->viber\" rel=\"nofollow\" target=\"_blank\">Viber</a></li>"
            . "<li><a class=\"visible-xs\" href=\"$this->viberMobile\" rel=\"nofollow\" target=\"_blank\">Viber</a></li>"
            . "<li><a href=\"$this->whatsapp\" rel=\"nofollow\" target=\"_blank\">Whats App</a></li>"
            . "<li><a href=\"$this->facebookMessanger\" rel=\"nofollow\" target=\"_blank\">Facebook Messanger</a></li>"
            . "</ul>";

        $this->assertEquals($expectedHTML, $actualHTML, 'Widget should render links to messengers');
    }

    public function testInvalidConfigExceptionNotString()
    {
        $this->expectException(InvalidConfigException::class);

        LetsTalk::widget(['configuratorId' => 123]);
    }

    public function testInvalidConfigException()
    {
        $this->expectException(InvalidConfigException::class);

        LetsTalk::widget(['configuratorId' => 'not exists ID']);
    }
}
