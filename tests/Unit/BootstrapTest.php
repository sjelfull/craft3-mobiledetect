<?php

use superbig\mobiledetect\MobileDetect;

it('boots Craft and installs the MobileDetect plugin', function () {
    expect(MobileDetect::getInstance())->toBeInstanceOf(MobileDetect::class);
})->skip('Plugin bootstrap needs Craft application context');
