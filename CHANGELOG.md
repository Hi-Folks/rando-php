# Changelog

## 0.3.0 / 1.0.0 - WIP

- Support for PHP 8.2, PHP 8.1 and PHP 8.0

## 0.2.0 - 2021-07-01
### Add
- Add special characters (specialCharacters() method) in Randomize::char() and Randomize::chars().
Special characters are: !"#$%&'()*+,-./:;<=>?@[\]^_`{|}~



## 0.1.9 - 2021-06-29
### Add
- Add Randomize::chars() for creating string (it is a kind of shortcut for Sequence class);


## 0.1.8 - 2021-03-27
### Add
- Adding Integer constructor with min and max
- Adding alphaLowerCase() and alphaUpperCase() methods Sequence (Chars);

### Change
- Refactor Char model
- change GitHub Actions workflow adding matrix for PHP 8, 7.4, 7.3

## 0.1.7 - 2021-03-23
### Add
- Add snap() and snapKey() in Draw class. You can retry 1 item from array

## 0.1.6 - 2020-11-13

### Add
- PHP 8 compatibility
- Add lower() method to Char for generating lower case chars: Randomize::char()->alpha()->lower()->generate() (thanks to @xanaDev);
- Add upper() method to Char for generating upper case chars: Randomize::char()->alpha()->upper()->generate() (thanks to @xanaDev);

### Change
- Register models in a property and load them with magic functions (thanks to @marcio-adue)

## 0.1.5 - 2020-10-21

### Fix
- Fix issue with array merge/append for alphanumeric

## 0.1.4 - 2020-10-14 HACKTOBERFEST 2020 - 2

### Add
- Add Latitude / Longitude coordinates random generation (as object , as array as number). Thanks to @vrabe
- Add Makefile to launch: unit tests, phpstan (level 6), phpcs (PSR12)
- Adding more tests for DateTime

### Change
- Set min and max default for date time (first day of the current year, last day of the current year), thanks to @armsasmart

### Documentation
- Improve readme file, thanks to @pret3nti0u5


## 0.1.3 - 2020-10-07 HACKTOBERFEST 2020 - 1

### Add
- Add Char Model, now you can generate random chars (numeric, alphabetical, alphanumeric...). Thanks to @parnus01
- Add DataTime Model, now you can generate a random date, thanks to @rebelchris
- Add Float Model, now you can generate a random float, thanks to @jirkavrba
- Add Sequence Char, now you can generate a sequence of chars, thanks to @bitasterisk
- Add toString method in order to have a concatenated sequence of chars, thanks to @paresh27



### Change
- Code is PSR compliance, thanks to @Septikwar
- Alias for the Integer class in Randomize.php, thanks to @Rocksheep
- Update/add some phpdocs, thanks to @webhaikal and @Septikwar
- more strict typed tests,thanks to @wesolowski

### CI/CD
- Add cache for vendors and PHP packages
- Add PHP Linter for 7.1, thanks to @Anita-ihuman

### Documentation examples
- Add example/RandomInteger.php file, thanks to @davidribeiro
- Add example/RandomBoolean.php, thanks to @rebelchris
- Add example/RandomDate.php, thanks to @rebelchris
- Add example/RandomFloat.php, thanks to @jirkavrba
- Add examples/RandomSequenceChar.php, thanks to @xanaDev
In readme file:
- Add range usage, thanks to @sam0hack
- Add generate char, thanks to @Zuruckt


-

## 0.1.2 - 2020-07-22

### Add
- preserveKeys() during drawing sample from an associative array
- added some test in order to have coverage 100%

### Change
- method unique(), allowDuplicates(), noDuplicates() for sequence generation;


## 0.1.1 - 2020-07-20

### Add
- range method for generating integer (shortcut for min and max)
- new examples, useful for new users
- add some notes how to launch test coverage
- add some warning in README specially for cryptographic usage (this is a pseudo random library).

### Change
- improve the usage section in readme

## 0.1.0 - 2020-07-19

- initial release
