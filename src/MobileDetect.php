<?php
/**
 * MobileDetect plugin for Craft CMS 3.x
 *
 * Use Mobile_Detect for detecting mobile devices (including tablets)
 *
 * @link      https://superbig.co
 * @copyright Copyright (c) 2017 Superbig
 */

namespace superbig\mobiledetect;

use superbig\mobiledetect\services\MobileDetectService as MobileDetectServiceService;
use superbig\mobiledetect\variables\MobileDetectVariable;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\web\twig\variables\CraftVariable;

use yii\base\Event;

/**
 * Class MobileDetect
 *
 * @author    Superbig
 * @package   MobileDetect
 * @since     1.0.0
 *
 * @property  MobileDetectServiceService $mobileDetectService
 */
class MobileDetect extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var MobileDetect
     */
    public static $plugin;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init ()
    {
        parent::init();
        self::$plugin = $this;

        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            function (Event $event) {
                /** @var CraftVariable $variable */
                $variable = $event->sender;
                $variable->set('mobileDetect', MobileDetectVariable::class);
            }
        );

        Craft::info(
            Craft::t(
                'mobile-detect',
                '{name} plugin loaded',
                [ 'name' => $this->name ]
            ),
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

}
