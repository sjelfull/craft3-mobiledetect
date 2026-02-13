<?php

declare(strict_types=1);

namespace superbig\mobiledetect\variables;

use superbig\mobiledetect\MobileDetect;

/**
 * Twig variable for MobileDetect.
 *
 * Usage in templates:
 *   {{ craft.mobileDetect.isMobile }}
 *   {{ craft.mobileDetect.isTablet }}
 *   {{ craft.mobileDetect.isPhone }}
 *   {{ craft.mobileDetect.is('iOS') }}
 */
class MobileDetectVariable
{
    public function isMobile(): bool
    {
        return MobileDetect::getInstance()->mobileDetectService->isMobile();
    }

    public function isTablet(): bool
    {
        return MobileDetect::getInstance()->mobileDetectService->isTablet();
    }

    public function isPhone(): bool
    {
        return MobileDetect::getInstance()->mobileDetectService->isPhone();
    }

    public function is(string $key): bool
    {
        return MobileDetect::getInstance()->mobileDetectService->is($key);
    }

    public function match(string $pattern, ?string $userAgent = null): bool
    {
        return MobileDetect::getInstance()->mobileDetectService->match($pattern, $userAgent);
    }

    public function version(string $component, string $type = 'float'): string|float|false
    {
        return MobileDetect::getInstance()->mobileDetectService->version($component, $type);
    }

    public function getVersion(): string
    {
        return MobileDetect::getInstance()->mobileDetectService->getVersion();
    }

    public function getUserAgent(): ?string
    {
        return MobileDetect::getInstance()->mobileDetectService->getUserAgent();
    }
}
