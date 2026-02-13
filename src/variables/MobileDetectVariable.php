<?php

declare(strict_types=1);

namespace superbig\mobiledetect\variables;

use BadMethodCallException;
use superbig\mobiledetect\MobileDetect;
use superbig\mobiledetect\services\MobileDetectService;

/**
 * Twig variable for MobileDetect.
 *
 * Usage in templates:
 *   {{ craft.mobileDetect.isMobile }}
 *   {{ craft.mobileDetect.isTablet }}
 *   {{ craft.mobileDetect.isPhone }}
 *   {{ craft.mobileDetect.is('iOS') }}
 *   {{ craft.mobileDetect.isiOS }}
 *   {{ craft.mobileDetect.isAndroidOS }}
 *   {{ craft.mobileDetect.isChrome }}
 *
 * Any `is*` call is forwarded to the library's rule matching via __call().
 */
class MobileDetectVariable
{
    public function __construct(
        private ?MobileDetectService $service = null,
    ) {
    }

    private function getService(): MobileDetectService
    {
        return $this->service ?? MobileDetect::getInstance()->mobileDetectService;
    }

    public function isMobile(): bool
    {
        return $this->getService()->isMobile();
    }

    public function isTablet(): bool
    {
        return $this->getService()->isTablet();
    }

    public function isPhone(): bool
    {
        return $this->getService()->isPhone();
    }

    public function is(string $key): bool
    {
        return $this->getService()->is($key);
    }

    public function match(string $pattern, ?string $userAgent = null): bool
    {
        return $this->getService()->match($pattern, $userAgent);
    }

    public function version(string $component, string $type = 'float'): string|float|false
    {
        return $this->getService()->version($component, $type);
    }

    public function getVersion(): string
    {
        return $this->getService()->getVersion();
    }

    public function getUserAgent(): ?string
    {
        return $this->getService()->getUserAgent();
    }

    /**
     * Forward any `is*` call to the library's rule matching.
     *
     * Supports all OS, browser, and device rules:
     *   isiOS(), isAndroidOS(), isChrome(), isSafari(), etc.
     *
     * @param array<mixed> $arguments
     */
    public function __call(string $name, array $arguments): bool
    {
        if (str_starts_with($name, 'is')) {
            return $this->is(substr($name, 2));
        }

        throw new BadMethodCallException("No such method: $name");
    }
}
