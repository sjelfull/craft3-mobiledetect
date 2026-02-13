# MobileDetect plugin for Craft CMS 5

Use Mobile_Detect for detecting mobile devices (including tablets).

![Screenshot](resources/img/icon.png)

## Requirements

- Craft CMS 5.5.0 or later
- PHP 8.2 or later

## Installation

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Tell Composer to load the plugin:

        composer require superbig/craft3-mobiledetect

3. In the Control Panel, go to Settings → Plugins and click the "Install" button for MobileDetect.

## Overview

A wrapper for the [Mobile_Detect](https://github.com/serbanghita/Mobile-Detect) library (v4) by [@serbanghita](https://github.com/serbanghita).

## Usage

### Twig

```twig
{{ craft.mobileDetect.isMobile ? 'I am mobile.' : 'I am not mobile.' }}
```

### PHP

```php
$service = \superbig\mobiledetect\MobileDetect::getInstance()->mobileDetectService;
$isMobile = $service->isMobile();
```

## Methods

### Device detection

| Method | Description |
|--------|-------------|
| `isMobile` | Returns `true` for any mobile device (including tablets) |
| `isTablet` | Returns `true` for tablets only |
| `isPhone` | Returns `true` for phones only (mobile but not tablet) |

### Rule-based detection

| Method | Description |
|--------|-------------|
| `is(key)` | Test any rule by name, e.g. `is('iOS')`, `is('AndroidOS')`, `is('Chrome')` |
| `match(pattern)` | Test using a regular expression against the user agent |
| `version(component)` | Get the version of a component, e.g. `version('Android')` |

### Utility methods

| Method | Description |
|--------|-------------|
| `getVersion` | Returns the Mobile_Detect library version |
| `getUserAgent` | Get the current user agent string |

## Upgrading from v2 (Craft 4)

### Breaking changes

- **`mobileGrade`** — Removed (not available in Mobile_Detect v4)
- **`getScriptVersion`** — Renamed to `getVersion`
- **`getCfHeaders` / `setCfHeaders`** — Replaced by `getCloudFrontHeaders` (service only)
- **OS-specific methods** (`isiOS`, `isAndroidOS`, etc.) — Use `is('iOS')`, `is('AndroidOS')` instead
- **`setUserAgent`** / **`setHttpHeaders`** — Available on the service only, not the Twig variable

### PHP service access

The static `$plugin` property has been removed. Use `getInstance()`:

```php
// Before (Craft 4)
MobileDetect::$plugin->mobileDetectService->isMobile();

// After (Craft 5)
MobileDetect::getInstance()->mobileDetectService->isMobile();
```

Brought to you by [Superbig](https://superbig.co)
