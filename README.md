# Rando-PHP

![CICD Github Actions](https://github.com/Hi-Folks/rando-php/workflows/PHP%20test/badge.svg)
![GitHub last commit](https://img.shields.io/github/last-commit/hi-folks/rando-php)
![GitHub Release Date](https://img.shields.io/github/release-date/hi-folks/rando-php)
![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/hi-folks/rando-php)


This is a PHP open source package for random stuff. With this package you can:
- **Draw**: Extract random items from an array. This is useful when you want to "draw" some numbers or items;
- **Generate**: useful for create random
   - *item* like integer, byte, boolean;
   - *sequences* like array of integer;

## Installation

You can install the package via composer:

```bash
composer require hi-folks/rando-php
```

## Usage

### Generate Boolean

Sometimes you want to obtain a random boolean true or false.(flip a coin):

``` php
$randomBool = Randomize::boolean()->generate();
```

### Generate an Integer

Sometimes you want to obtain a random integer (min - max rang). For example, you want to roll the dice:

``` php
$randomNumber = Randomize::integer()->min(1)->max(6)->generate();
```

### Generate bytes
Sometime you want to obtain some random bytes (hexadecimal). For example, you want to generate a random RGB color (a hex triplet in hexadecimal format):

```php
$randomRGB = Randomize::byte()->length(3)->generate();
```

### Generate sequences
Sometime you want to obtain some random sequences. For example, you want to roll the dice 15 times:

```php
$randomRolls = Randomize::sequence()->min(1)->max(6)->count(15)->generate();
```

### Generate sequences with no duplicates
Sometime you want to obtain some random sequences with **no duplicates**. For example, you want to play "Tombola" (extracting number from 1 to 90 with NO duplicates):

```php
$randomTombola = Randomize::sequence()->min(1)->max(90)->count(90)->unique()->generate();
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Submit ideas or feature requests or issues
Take a look if your request is already there https://github.com/Hi-Folks/rando-php/issues
If it is not present, you can create a new one https://github.com/Hi-Folks/rando-php/issues/new

## Credits

- [Roberto Butti](https://github.com/roberto-butti)
- [All Contributors](../../contributors)
- [PHP Package Boilerplate](https://laravelpackageboilerplate.com)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.


