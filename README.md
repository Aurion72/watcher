# Watcher

[![Build Status](https://travis-ci.org/aurion72/watcher.svg?branch=master)](https://travis-ci.org/aurion72/watcher)
[![styleci](https://styleci.io/repos/CHANGEME/shield)](https://styleci.io/repos/CHANGEME)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/aurion72/watcher/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/aurion72/watcher/?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/CHANGEME/mini.png)](https://insight.sensiolabs.com/projects/CHANGEME)
[![Coverage Status](https://coveralls.io/repos/github/aurion72/watcher/badge.svg?branch=master)](https://coveralls.io/github/aurion72/watcher?branch=master)

[![Packagist](https://img.shields.io/packagist/v/aurion72/watcher.svg)](https://packagist.org/packages/aurion72/watcher)
[![Packagist](https://poser.pugx.org/aurion72/watcher/d/total.svg)](https://packagist.org/packages/aurion72/watcher)
[![Packagist](https://img.shields.io/packagist/l/aurion72/watcher.svg)](https://packagist.org/packages/aurion72/watcher)

Package description: a mysterious watcher

## Installation

Install via composer
```bash
composer require aurion72/watcher
```

### Register Service Provider

**Note! This and next step are optional if you use laravel>=5.5 with package
auto discovery feature.**

Add service provider to `config/app.php` in `providers` section
```php
Aurion72\Watcher\WatcherServiceProvider::class,
```

### Register Facade

Register package facade in `config/app.php` in `aliases` section
```php
Aurion72\Watcher\Facades\Watcher::class,
```

### Publish Configuration File

```bash
php artisan vendor:publish --provider="Aurion72\Watcher\WatcherServiceProvider" --tag="config"
```

## Usage

42

## Security

If you discover any security related issues, please email 
instead of using the issue tracker.

## Credits

- [](https://github.com/aurion72/watcher)
- [All contributors](https://github.com/aurion72/watcher/graphs/contributors)

This package is bootstrapped with the help of
[melihovv/laravel-package-generator](https://github.com/melihovv/laravel-package-generator).
