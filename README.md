[![Latest Stable Version](https://img.shields.io/packagist/v/drupol/launcher.svg?style=flat-square)](https://packagist.org/packages/drupol/launcher)
 [![GitHub stars](https://img.shields.io/github/stars/drupol/launcher.svg?style=flat-square)](https://packagist.org/packages/drupol/launcher)
 [![Total Downloads](https://img.shields.io/packagist/dt/drupol/launcher.svg?style=flat-square)](https://packagist.org/packages/drupol/launcher)
 [![Build Status](https://img.shields.io/travis/drupol/launcher/master.svg?style=flat-square)](https://travis-ci.org/drupol/launcher)
 [![Scrutinizer code quality](https://img.shields.io/scrutinizer/quality/g/drupol/launcher/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/drupol/launcher/?branch=master)
 [![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/drupol/launcher/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/drupol/launcher/?branch=master)
 [![Mutation testing badge](https://badge.stryker-mutator.io/github.com/drupol/launcher/master)](https://stryker-mutator.github.io)
 [![License](https://img.shields.io/packagist/l/drupol/launcher.svg?style=flat-square)](https://packagist.org/packages/drupol/launcher)

# OS Launcher

## Description

Allows you to launch a file or a resource with the your default OS application.

## Requirements

* PHP >= 7.1

## Installation

```composer require drupol/launcher```

## Usage

```php
<?php

declare(strict_types = 1);

include 'vendor/autoload.php';

use drupol\launcher\Launcher;

// Open the default browser.
Launcher::open('https://github.com/drupol/launcher');

// Open the default file manager.
Launcher::open('/tmp');

// Open the default file manager.
Launcher::open('C:\Windows');

// The parameter $resource is variadic.

// Open multiple resources.
Launcher::open('https://google.com', 'https://github.com');
```

## Code quality, tests and benchmarks

Every time changes are introduced into the library, [Travis CI](https://travis-ci.org/drupol/launcher/builds) run the tests and the benchmarks.

The library has tests written with [PHPSpec](http://www.phpspec.net/).
Feel free to check them out in the `spec` directory. Run `composer phpspec` to trigger the tests.

Before each commit some inspections are executed with [GrumPHP](https://github.com/phpro/grumphp), run `./vendor/bin/grumphp run` to check manually.

[PHPBench](https://github.com/phpbench/phpbench) is used to benchmark the library, to run the benchmarks: `composer bench`

[PHPInfection](https://github.com/infection/infection) is used to ensure that your code is properly tested, run `composer infection` to test your code.

## Contributing

Feel free to contribute to this library by sending Github pull requests. I'm quite reactive :-)
