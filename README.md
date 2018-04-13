<h1 align="center">Load4wrd</h1>

Load4wrd is a tool for E-Loading Business for 3 networks (SMART, SUN and GLOBE) in the Philippines.

## About Load4wrd

Load4wrd is a framework agnostic PHP library that is designed to simplify the task of developing innovative e-loading businnes for 3 networks in the philippines.


## Installation
### 1 - Dependency
The first step is using composer to install the package and automatically update your `composer.json` file, you can do this by running:
```shell
composer require pollycodes/load4wrd
```

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

### 4 - Config

In order to use the `Load4wrd`, you need to setup your account from Load4wrd on the `config/services.php` file, you can do that the following way:

> `config/services.php`

```php
// file START ommited
    return [
        'load4wrd' => [
            'username' => env('L4D_USERNAME', 'Your-Username'),
            'password' => env('L4D_PASSWORD', 'Your-Password'),
        ],
    ];
// file END ommited
```

### 5 - Environment

For security purpose you can use `.env` file, you can do that the following way:

> `.env`

```php
// file START ommited
    L4D_USERNAME=Your-Username
    L4D_PASSWORD=Your-Password
// file END ommited
```

## Documentation

Sample Code:

```php
namespace App\Http\Controllers;

use PollyCodes\Load4wrd\Loading;

class LoadController extends Controller
{
    public function RequestLoad($target, $code) {
      $loading = new Loading();
      $json = $loading->Send('TARGET-MOBILE-NUMBER', 'PRODUCT-CODE');
      return $json;
    }

    public function CheckWallet($target, $code) {
      $loading = new Loading();
      $json = $loading->Balance();
      return $json;
    }
}
```

## Contact Us
**For registration and to have a Wallet Load from Telco**

- Mobile: 09177715380 or 09995233848
- Gmail: kingpauloaquino@gmail.com

## Security Vulnerabilities

If you discover a security vulnerability within Load4wrd, please send an e-mail to King Paulo Aquino at kingpauloaquino@gmail.com. All security vulnerabilities will be promptly addressed.

## License

Load4wrd is free software distributed under the terms of the MIT license.