<?php
/**
 * MobileDetect plugin for Craft CMS 3.x
 *
 * Use Mobile_Detect for detecting mobile devices (including tablets)
 *
 * @link      https://superbig.co
 * @copyright Copyright (c) 2017 Superbig
 */

namespace superbig\mobiledetect\variables;

use Detection\MobileDetect as MobileDetectLib;

use Craft;

/**
 * @author    Superbig
 * @package   MobileDetect
 * @since     1.0.0
 */
class MobileDetectVariable
{
    private ?MobileDetectLib $_mobileDetect = null;

    // Public Methods
    // =========================================================================

    /**
     * @return \Mobile_Detect|null
     */
    public function getMobileDetect (): MobileDetectLib
    {
        if ( $this->_mobileDetect === null ) {
            $this->_mobileDetect = new MobileDetectLib();
        }

        return $this->_mobileDetect;
    }

    /**
     * Returns true for any mobile device (including tablets!)
     */
    public function isMobile (): bool
    {
        return $this->getMobileDetect()->isMobile();
    }

    /**
     * Returns true for tablets only
     */
    public function isTablet (): bool
    {
        return $this->getMobileDetect()->isTablet();
    }

    /**
     * Returns true for phones only
     */
    public function isPhone (): bool
    {
        return $this->isMobile() && !$this->isTablet();
    }

    /**
     * I can haz iOS?
     *
     * @return mixed
     */
    public function isiOS (): bool
    {
        return $this->getMobileDetect()->isiOS();
    }

    /**
     * I can haz Android?
     *
     * @return mixed
     */
    public function isAndroidOS (): bool
    {
        return $this->getMobileDetect()->isAndroidOS();
    }

    /**
     * I can haz BlackBerry?
     *
     * @return mixed
     */
    public function isBlackBerryOS (): bool
    {
        return $this->getMobileDetect()->isBlackBerryOS();
    }

    /**
     * I can haz Palm?
     *
     * @return mixed
     */
    public function isPalmOS (): bool
    {
        return $this->getMobileDetect()->isPalmOS();
    }

    /**
     * I can haz Symbian?
     *
     * @return mixed
     */
    public function isSymbianOS (): bool
    {
        return $this->getMobileDetect()->isSymbianOS();
    }

    /**
     * I can haz Windows Mobile?
     *
     * @return mixed
     */
    public function isWindowsMobileOS (): bool
    {
        return $this->getMobileDetect()->isWindowsMobileOS();
    }

    /**
     * I can haz Windows Phone?
     *
     * @return mixed
     */
    public function isWindowsPhoneOS (): bool
    {
        return $this->getMobileDetect()->isWindowsPhoneOS();
    }

    /**
     * Test anything, e.g. is('iphone')
     *
     * @param      $key
     * @param null $userAgent
     * @param null $httpHeaders
     *
     * @return bool|int|null
     */
    public function is ($key, $userAgent = null, $httpHeaders = null)
    {
        return $this->getMobileDetect()->is($key, $userAgent, $httpHeaders);
    }


    /**
     * Do the regex!
     *
     * @param      $pattern
     * @param null $userAgent
     */
    public function match ($pattern, $userAgent = null): bool
    {
        return $this->getMobileDetect()->match($pattern, $userAgent);
    }

    /**
     *  Get the version of any component, e.g. version('Android')
     *
     * @param $component
     *
     * @return bool|int|null
     */
    public function version ($component)
    {
        return $this->getMobileDetect()->is($component);
    }

    /**
     * Returns browser grade, e.g "A"
     */
    public function mobileGrade (): string
    {
        return $this->getMobileDetect()->mobileGrade();
    }

    /**
     * Returns the Mobile_Detect library version
     */
    public function getScriptVersion (): string
    {
        return $this->getMobileDetect()->getScriptVersion();
    }

    /**
     * Get user agent
     */
    public function getUserAgent (): ?string
    {
        return $this->getMobileDetect()->getUserAgent();
    }

    /**
     * Set user agent
     *
     * @param null $userAgent
     */
    public function setUserAgent ($userAgent = null): ?string
    {
        return $this->getMobileDetect()->setUserAgent($userAgent);
    }

    /**
     * Get mobile headers
     *
     * @return mixed[]
     */
    public function getMobileHeaders (): array
    {
        return $this->getMobileDetect()->getMobileHeaders();
    }

    /**
     * Get http headers
     *
     * @return mixed[]
     */
    public function getHttpHeaders (): array
    {
        return $this->getMobileDetect()->getHttpHeaders();
    }

    /**
     * Set http headers
     *
     * @param null $httpHeaders
     */
    public function setHttpHeaders ($httpHeaders = null): void
    {
        $this->getMobileDetect()->setHttpHeaders($httpHeaders);
    }

    /**
     * Get CloudFront headers
     *
     * @return mixed[]
     */
    public function getCfHeaders (): array
    {
        return $this->getMobileDetect()->getCfHeaders();
    }

    /**
     * Set CloudFront headers
     *
     * @param null $cfHeaders
     */
    public function setCfHeaders ($cfHeaders = null): void
    {
        $this->getMobileDetect()->setCfHeaders($cfHeaders);
    }
}
