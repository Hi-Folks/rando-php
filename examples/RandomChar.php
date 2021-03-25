<?php
require_once "./vendor/autoload.php";

use HiFolks\RandoPhp\Randomize;
echo "--- GENERATING A LOWER CASE CHAR (a-z)" . PHP_EOL;
echo "--- Randomize::char()->generate();". PHP_EOL;
echo "CHAR " . Randomize::char()->generate();
echo PHP_EOL. "-----------------".PHP_EOL;

echo "--- GENERATING A NUMERIC CHAR" . PHP_EOL;
echo "--- Randomize::char()->numeric()->generate();". PHP_EOL;
echo "CHAR " . Randomize::char()->numeric()->generate();
echo PHP_EOL. "-----------------".PHP_EOL;

echo "--- GENERATING A ALPHABETIC CHAR a-z A-Z" . PHP_EOL;
echo "--- Randomize::char()->alpha()->generate();". PHP_EOL;
echo "CHAR " . Randomize::char()->alpha()->generate();
echo PHP_EOL. "-----------------".PHP_EOL;

echo "--- GENERATING AN ALPHABETIC LOWERCASE CHAR (a-z)" . PHP_EOL;
echo "--- Randomize::char()->alphaLowerCase()->generate();". PHP_EOL;
echo "CHAR " . Randomize::char()->alphaLowerCase()->generate();
echo PHP_EOL. "-----------------".PHP_EOL;

echo "--- GENERATING AN ALPHABETIC UPPERCASE CHAR (A-Z)" . PHP_EOL;
echo "--- Randomize::char()->alphaUpperCase()->generate();". PHP_EOL;
echo "CHAR " . Randomize::char()->alphaUpperCase()->generate();
echo PHP_EOL. "-----------------".PHP_EOL;

echo "--- GENERATING A ALPHANUMERIC CHAR (a-z A-Z 0-9)" . PHP_EOL;
echo "--- Randomize::char()->alphanumeric()->generate();". PHP_EOL;
echo "CHAR " . Randomize::char()->alphanumeric()->generate();
echo PHP_EOL. "-----------------".PHP_EOL;

echo "--- GENERATING A ALPHANUMERIC LOWERCASE CHAR" . PHP_EOL;
echo "--- Randomize::char()->alphanumeric()->lower()->generate();". PHP_EOL;
echo "CHAR " . Randomize::char()->alphanumeric()->lower()->generate();
echo PHP_EOL. "-----------------".PHP_EOL;

echo "--- GENERATING A ALPHANUMERIC UPPERCASE CHAR" . PHP_EOL;
echo "--- Randomize::char()->alphanumeric()->upper()->generate();". PHP_EOL;
echo "CHAR " . Randomize::char()->alphanumeric()->upper()->generate();
echo PHP_EOL. "-----------------".PHP_EOL;
