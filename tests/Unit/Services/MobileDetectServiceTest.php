<?php

use superbig\mobiledetect\services\MobileDetectService;

beforeEach(function () {
    $this->service = new MobileDetectService();
});

it('detects iPhone as mobile', function () {
    $this->service->getMobileDetect()->setUserAgent(
        'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.0 Mobile/15E148 Safari/604.1'
    );

    expect($this->service->isMobile())->toBeTrue();
    expect($this->service->isTablet())->toBeFalse();
    expect($this->service->isPhone())->toBeTrue();
});

it('detects iPad as tablet', function () {
    $this->service->getMobileDetect()->setUserAgent(
        'Mozilla/5.0 (iPad; CPU OS 17_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.0 Mobile/15E148 Safari/604.1'
    );

    expect($this->service->isMobile())->toBeTrue();
    expect($this->service->isTablet())->toBeTrue();
    expect($this->service->isPhone())->toBeFalse();
});

it('detects Android phone as mobile', function () {
    $this->service->getMobileDetect()->setUserAgent(
        'Mozilla/5.0 (Linux; Android 14; Pixel 8) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Mobile Safari/537.36'
    );

    expect($this->service->isMobile())->toBeTrue();
    expect($this->service->isPhone())->toBeTrue();
});

it('detects desktop browser as not mobile', function () {
    $this->service->getMobileDetect()->setUserAgent(
        'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36'
    );

    expect($this->service->isMobile())->toBeFalse();
    expect($this->service->isTablet())->toBeFalse();
    expect($this->service->isPhone())->toBeFalse();
});

it('detects OS via is() method', function () {
    $this->service->getMobileDetect()->setUserAgent(
        'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.0 Mobile/15E148 Safari/604.1'
    );

    expect($this->service->is('iOS'))->toBeTrue();
    expect($this->service->is('AndroidOS'))->toBeFalse();
});

it('detects Android OS via is() method', function () {
    $this->service->getMobileDetect()->setUserAgent(
        'Mozilla/5.0 (Linux; Android 14; Pixel 8) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Mobile Safari/537.36'
    );

    expect($this->service->is('AndroidOS'))->toBeTrue();
    expect($this->service->is('iOS'))->toBeFalse();
});

it('returns library version', function () {
    expect($this->service->getVersion())->toBeString()->not->toBeEmpty();
});

it('can get and set user agent', function () {
    $ua = 'TestAgent/1.0';
    $this->service->setUserAgent($ua);

    expect($this->service->getUserAgent())->toBe($ua);
});

it('can match custom regex pattern', function () {
    $this->service->getMobileDetect()->setUserAgent(
        'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X)'
    );

    expect($this->service->match('iPhone'))->toBeTrue();
    expect($this->service->match('Android'))->toBeFalse();
});

it('returns version info for components', function () {
    $this->service->getMobileDetect()->setUserAgent(
        'Mozilla/5.0 (Linux; Android 14; Pixel 8) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Mobile Safari/537.36'
    );

    $version = $this->service->version('Android');
    expect($version)->not->toBeFalse();
});

it('lazily initializes MobileDetect instance', function () {
    $detect1 = $this->service->getMobileDetect();
    $detect2 = $this->service->getMobileDetect();

    expect($detect1)->toBe($detect2);
});
