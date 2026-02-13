# MobileDetect Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/) and this project adheres to [Semantic Versioning](http://semver.org/).

## 3.0.0 - 2026-02-13

### Added
- Craft 5.5+ support
- PHP 8.2+ requirement
- Mobile_Detect library upgraded to v4.8
- ECS, PHPStan, and Rector dev tooling
- Pest test suite
- Proper type declarations throughout

### Changed
- `getScriptVersion` renamed to `getVersion` (matching upstream library)
- Twig variable now delegates to service (single code path)
- Plugin uses `getInstance()` instead of static `$plugin` property
- OS detection methods replaced by generic `is()` method (e.g. `is('iOS')`)

### Removed
- `mobileGrade` method (removed in Mobile_Detect v4)
- `getCfHeaders` / `setCfHeaders` (use `getCloudFrontHeaders` on service)
- Static `$plugin` property
- `version` field from composer.json (tag-based versioning)
- `repositories` block from composer.json
- `schemaVersion` from plugin config (no database tables)
- `components` from plugin extra config (registered in `init()`)

## 2.0.0 - 2022-10-03

### Added
- Added Craft 4 support

## 1.0.2 - 2019-01-18
### Changed
- Changed craftcms dependency to support 3.1

## 1.0.1 - 2017-11-06
### Changed
- Now uses the namespaced version of Mobile_Detect

## 1.0.0 - 2017-11-05
### Added
- Initial release
