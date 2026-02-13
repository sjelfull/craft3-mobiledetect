<?php

use superbig\mobiledetect\MobileDetect;
use superbig\mobiledetect\services\MobileDetectService;
use superbig\mobiledetect\variables\MobileDetectVariable;

beforeEach(function () {
    // Create a mock plugin instance with a real service
    $service = new MobileDetectService();
    $service->getMobileDetect()->setUserAgent(
        'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.0 Mobile/15E148 Safari/604.1'
    );

    // Mock the plugin singleton
    $plugin = $this->createMock(MobileDetect::class);
    $plugin->mobileDetectService = $service;

    // Use reflection to set the static instance
    $ref = new ReflectionProperty(\craft\base\Plugin::class, '_instances');
    $ref->setAccessible(true);
    $instances = $ref->getValue();
    $instances[MobileDetect::class] = $plugin;
    $ref->setValue(null, $instances);

    $this->variable = new MobileDetectVariable();
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
