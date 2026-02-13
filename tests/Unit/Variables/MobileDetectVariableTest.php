<?php

use superbig\mobiledetect\services\MobileDetectService;
use superbig\mobiledetect\variables\MobileDetectVariable;

beforeEach(function () {
    $this->service = new MobileDetectService();
    $this->service->getMobileDetect()->setUserAgent(
        'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.0 Mobile/15E148 Safari/604.1'
    );

    $this->variable = new MobileDetectVariable($this->service);
});

it('delegates isMobile to service', function () {
    expect($this->variable->isMobile())->toBeTrue();
});

it('delegates isTablet to service', function () {
    expect($this->variable->isTablet())->toBeFalse();
});

it('delegates isPhone to service', function () {
    expect($this->variable->isPhone())->toBeTrue();
});

it('delegates is() to service', function () {
    expect($this->variable->is('iOS'))->toBeTrue();
});

it('delegates getVersion to service', function () {
    expect($this->variable->getVersion())->toBeString()->not->toBeEmpty();
});

it('delegates getUserAgent to service', function () {
    expect($this->variable->getUserAgent())->toContain('iPhone');
});

// Magic __call() tests

it('forwards isiOS() via __call to service', function () {
    expect($this->variable->isiOS())->toBeTrue();
});

it('forwards isAndroidOS() via __call and returns false for iPhone UA', function () {
    expect($this->variable->isAndroidOS())->toBeFalse();
});

it('forwards isChrome() via __call and returns false for Safari UA', function () {
    expect($this->variable->isChrome())->toBeFalse();
});

it('forwards isSafari() via __call for iPhone Safari UA', function () {
    expect($this->variable->isSafari())->toBeTrue();
});

it('throws BadMethodCallException for non-is methods', function () {
    $this->variable->fooBar();
})->throws(BadMethodCallException::class, 'No such method: fooBar');

it('detects Android OS via magic method with Android UA', function () {
    // Swap to an Android user agent on the same service instance
    $this->service->getMobileDetect()->setUserAgent(
        'Mozilla/5.0 (Linux; Android 14; Pixel 8) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Mobile Safari/537.36'
    );

    expect($this->variable->isAndroidOS())->toBeTrue();
    expect($this->variable->isiOS())->toBeFalse();
    expect($this->variable->isChrome())->toBeTrue();
});
