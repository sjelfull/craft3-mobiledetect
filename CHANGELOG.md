# MobileDetect Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/) and this project adheres to [Semantic Versioning](http://semver.org/).

## 3.0.0 - 2026-02-13

### Added
- Craft 5 support
- PHP 8.2+ support

### Changed
- `getScriptVersion` renamed to `getVersion` (upstream library change)

### Removed
- `mobileGrade` method (removed in Mobile_Detect v4)
- `getCfHeaders` / `setCfHeaders` (use `getCloudFrontHeaders` on service)

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
