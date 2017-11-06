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
    private $_mobileDetect = null;

    // Public Methods
    // =========================================================================

    /**
     * @return \Mobile_Detect|null
     */
    public function getMobileDetect ()
    {
        if ( $this->_mobileDetect === null ) {
            $this->_mobileDetect = new MobileDetectLib();
        }

        return $this->_mobileDetect;
    }

    /**
     * Returns true for any mobile device (including tablets!)
     *
     * @return bool
     */
    public function isMobile ()
    {
        return $this->getMobileDetect()->isMobile();
    }

    /**
     * Returns true for tablets only
     *
     * @return bool
     */
    public function isTablet ()
    {
        return $this->getMobileDetect()->isTablet();
    }

    /**
     * Returns true for phones only
     *
     * @return bool
     */
    public function isPhone ()
    {
        return $this->isMobile() && !$this->isTablet();
    }

    /**
     * I can haz iOS?
     *
     * @return mixed
     */
    public function isiOS ()
    {
        return $this->getMobileDetect()->isiOS();
    }

    /**
     * I can haz Android?
     *
     * @return mixed
     */
    public function isAndroidOS ()
    {
        return $this->getMobileDetect()->isAndroidOS();
    }

    /**
     * I can haz BlackBerry?
     *
     * @return mixed
     */
    public function isBlackBerryOS ()
    {
        return $this->getMobileDetect()->isBlackBerryOS();
    }

    /**
     * I can haz Palm?
     *
     * @return mixed
     */
    public function isPalmOS ()
    {
        return $this->getMobileDetect()->isPalmOS();
    }

    /**
     * I can haz Symbian?
     *
     * @return mixed
     */
    public function isSymbianOS ()
    {
        return $this->getMobileDetect()->isSymbianOS();
    }

    /**
     * I can haz Windows Mobile?
     *
     * @return mixed
     */
    public function isWindowsMobileOS ()
    {
        return $this->getMobileDetect()->isWindowsMobileOS();
    }

    /**
     * I can haz Windows Phone?
     *
     * @return mixed
     */
    public function isWindowsPhoneOS ()
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
     *
     * @return bool
     */
    public function match ($pattern, $userAgent = null)
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
     *
     * @return string
     */
    public function mobileGrade ()
    {
        return $this->getMobileDetect()->mobileGrade();
    }

    /**
     * Returns the Mobile_Detect library version
     *
     * @return string
     */
    public function getScriptVersion ()
    {
        return $this->getMobileDetect()->getScriptVersion();
    }

    /**
     * Get user agent
     *
     * @return null|string
     */
    public function getUserAgent ()
    {
        return $this->getMobileDetect()->getUserAgent();
    }

    /**
     * Set user agent
     *
     * @param null $userAgent
     *
     * @return null|string
     */
    public function setUserAgent ($userAgent = null)
    {
        return $this->getMobileDetect()->setUserAgent($userAgent);
    }

    /**
     * Get mobile headers
     *
     * @return array
     */
    public function getMobileHeaders ()
    {
        return $this->getMobileDetect()->getMobileHeaders();
    }

    /**
     * Get http headers
     *
     * @return array
     */
    public function getHttpHeaders ()
    {
        return $this->getMobileDetect()->getHttpHeaders();
    }

    /**
     * Set http headers
     *
     * @param null $httpHeaders
     */
    public function setHttpHeaders ($httpHeaders = null)
    {
        $this->getMobileDetect()->setHttpHeaders($httpHeaders);
    }

    /**
     * Get CloudFront headers
     *
     * @return array
     */
    public function getCfHeaders ()
    {
        return $this->getMobileDetect()->getCfHeaders();
    }

    /**
     * Set CloudFront headers
     *
     * @param null $cfHeaders
     */
    public function setCfHeaders ($cfHeaders = null)
    {
        $this->getMobileDetect()->setCfHeaders($cfHeaders);
    }
}
