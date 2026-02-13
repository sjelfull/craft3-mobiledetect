<?php

declare(strict_types=1);

namespace superbig\mobiledetect;

use Craft;
use craft\base\Plugin;
use craft\web\twig\variables\CraftVariable;
use superbig\mobiledetect\services\MobileDetectService;
use superbig\mobiledetect\variables\MobileDetectVariable;
use yii\base\Event;

/**
 * @property MobileDetectService $mobileDetectService
 */
class MobileDetect extends Plugin
{
    public function init(): void
    {
        parent::init();

        $this->setComponents([
            'mobileDetectService' => MobileDetectService::class,
        ]);

        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            static function(Event $event): void {
                /** @var CraftVariable $variable */
                $variable = $event->sender;
                $variable->set('mobileDetect', MobileDetectVariable::class);
            }
        );

        Craft::info('MobileDetect plugin loaded', __METHOD__);
    }
}
