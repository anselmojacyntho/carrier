# Carrier

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]

The Carrier is a package for PHP and Laravel that provides integration with [postmon](https://postmon.com.br/) and the [IBGE api](https://servicodados.ibge.gov.br/api/docs/localidades?versao=1) to allow searches of addresses by cep and listings of states, cities, neighborhoods and regions of Brazil.

## Installation

Via Composer

Pull this package in through Composer.

```js

    {
        "require": {
            "anselmojacyntho/carrier": "dev-master"
        }
    }

```

or run in terminal:
`composer require anselmojacyntho/carrier`

### Laravel 5.0+ Integration

Add the service provider to your `config/app.php` file:

```php

    'providers'     => array(

        //...        
        AnselmoJacyntho\Carrier\CarrierServiceProvider::class

    ),

```

Add the facade to your `config/app.php` file:

```php

    'aliases'       => array(

        //...        
        'Carrier': AnselmoJacyntho\Carrier\Facades\Carrier::class

    ),

```

## Usage

The package provides an easy interface for search address by CEP or litings regions, states, cities and neighborhoods from your application. 

### Laravel usage

```php

    use AnselmoJacyntho\Carrier\Facades\Carrier;

    // Get address by cep
    $response = Carrier::findByCep('328947');

    // Get all regions
    $response = Carrier::getRegions();

    // Get states by region id
    $response = Carrier::getStatesByRegion(1);

    // Get all states
    $response = Carrier::getStates();

    // Get all cities
    $response = Carrier::getCities();

    // Get city by state id
    $response = Carrier::getCitiesByState(3);

    // Get all district by city id
    $response = Carrier::getDistrictsByCity(3550308);

```

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email author email instead of using the issue tracker.

## Credits

- [author name][link-author]
- [All Contributors][link-contributors]

## License

license. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/anselmojacyntho/carrier.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/anselmojacyntho/carrier.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/anselmojacyntho/carrier/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/anselmojacyntho/carrier
[link-downloads]: https://packagist.org/packages/anselmojacyntho/carrier
[link-travis]: https://travis-ci.org/anselmojacyntho/carrier
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/anselmojacyntho
[link-contributors]: ../../contributors
