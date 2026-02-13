<?php

declare(strict_types=1);

namespace superbig\mobiledetect\services;

use craft\base\Component;
use Detection\MobileDetect as MobileDetectLib;

class MobileDetectService extends Component
{
    private ?MobileDetectLib $mobileDetect = null;

    public function getMobileDetect(): MobileDetectLib
    {
        if ($this->mobileDetect === null) {
            $this->mobileDetect = new MobileDetectLib();
        }

        return $this->mobileDetect;
    }

    /**
     * Returns true for any mobile device (including tablets).
     */
    public function isMobile(): bool
    {
        return $this->getMobileDetect()->isMobile();
    }

    /**
     * Returns true for tablets only.
     */
    public function isTablet(): bool
    {
        return $this->getMobileDetect()->isTablet();
    }

    /**
     * Returns true for phones only (mobile but not tablet).
     */
    public function isPhone(): bool
    {
        return $this->isMobile() && !$this->isTablet();
    }

    /**
     * Test any rule by name, e.g. is('iOS'), is('AndroidOS'), is('Chrome').
     */
    public function is(string $key): bool
    {
        return (bool) $this->getMobileDetect()->is($key);
    }

    /**
     * Match a custom regex against the user agent.
     */
    public function match(string $pattern, ?string $userAgent = null): bool
    {
        return $this->getMobileDetect()->match($pattern, $userAgent ?? $this->getUserAgent() ?? '');
    }

    /**
     * Get the version of a component, e.g. version('Android').
     */
    public function version(string $component, string $type = 'float'): string|float|false
    {
        return $this->getMobileDetect()->version($component, $type);
    }

    /**
     * Returns the Mobile_Detect library version.
     */
    public function getVersion(): string
    {
        return $this->getMobileDetect()->getVersion();
    }

    /**
     * Get the current user agent string.
     */
    public function getUserAgent(): ?string
    {
        return $this->getMobileDetect()->getUserAgent();
    }

    /**
     * Set the user agent string.
     */
    public function setUserAgent(string $userAgent): void
    {
        $this->getMobileDetect()->setUserAgent($userAgent);
    }

    /**
     * Get mobile detection headers.
     *
     * @return array<string, string>
     */
    public function getMobileHeaders(): array
    {
        return $this->getMobileDetect()->getMobileHeaders();
    }

    /**
     * Get all HTTP headers.
     *
     * @return array<string, string>
     */
    public function getHttpHeaders(): array
    {
        return $this->getMobileDetect()->getHttpHeaders();
    }

    /**
     * Set HTTP headers.
     *
     * @param array<string, string> $httpHeaders
     */
    public function setHttpHeaders(array $httpHeaders): void
    {
        $this->getMobileDetect()->setHttpHeaders($httpHeaders);
    }

    /**
     * Get CloudFront HTTP headers.
     *
     * @return array<string, string>
     */
    public function getCloudFrontHeaders(): array
    {
        return $this->getMobileDetect()->getCloudFrontHttpHeaders();
    }
}
