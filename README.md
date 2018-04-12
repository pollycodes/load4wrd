
<!-- <p align="center"><img height="188" width="198" src="https://botman.io/img/botman.png"></p> -->
<h1 align="center">Load4wrd</h1>

Load4wrd is a tool for E-Loading Business for 3 networks (SMART, SUN and GLOBE) in the Philippines.

## About Load4wrd

Load4wrd is a framework agnostic PHP library that is designed to simplify the task of developing innovative e-loading businnes for 3 networks in the philippines.

```php
$loading->Send('TARGET-MOBILE-NUMBER', 'PRODUCT-CODE');

$loading->Balance();
```

## Installation
### 1 - Dependency
The first step is using composer to install the package and automatically update your `composer.json` file, you can do this by running:
```shell
composer require pollycodes/load4wrd
```
> **Note**: If you are using Laravel 5.5, the steps 2 and 3, for providers and aliases, are unnecessaries. SEOTools supports Laravel new [Package Discovery](https://laravel.com/docs/5.5/packages#package-discovery).

### 2 - Provider
You need to update your application configuration in order to register the package so it can be loaded by Laravel, just update your `config/app.php` file adding the following code at the end of your `'providers'` section:

> `config/app.php`

```php
// file START ommited
    'providers' => [
        // other providers ommited
        PollyCodes\Load4wrd\Load4wrdServiceProvider::class,
    ],
// file END ommited
```

#### Lumen
Go to `/bootstrap/app.php` file and add this line:

```php
// file START ommited
	$app->register(PollyCodes\Load4wrd\Load4wrdServiceProvider::class);
// file END ommited
```

### 3 - Facade

> Facades are not supported in Lumen.

In order to use the `Load4wrd` facade, you need to register it on the `config/app.php` file, you can do that the following way:

```php
// file START ommited
    'aliases' => [
        'Load4wrd' => PollyCodes\Load4wrd\Facades\Load4wrd::class,
    ],
// file END ommited
```



## Documentation

You can find the BotMan documentation SOON...

## Contact Us
**For registration and to have a Wallet Load from Telco**

- Mobile: 09177715380 or 09995233848
- Gmail: kingpauloaquino@gmail.com

## Security Vulnerabilities

If you discover a security vulnerability within Load4wrd, please send an e-mail to King Paulo Aquino at kingpauloaquino@gmail.com. All security vulnerabilities will be promptly addressed.

## License

Load4wrd is free software distributed under the terms of the MIT license.