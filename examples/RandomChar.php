<?php
require_once "./vendor/autoload.php";

use HiFolks\RandoPhp\Randomize;

echo "--- GENERATING A NUMERIC CHAR" . PHP_EOL;
echo "--- Randomize::char()->numeric()->generate();". PHP_EOL;
echo "CHAR " . Randomize::char()->numeric()->generate();
echo PHP_EOL. "-----------------".PHP_EOL;

echo "--- GENERATING A ALPHABETIC CHAR" . PHP_EOL;
echo "--- Randomize::char()->alpha()->generate();". PHP_EOL;
echo "CHAR " . Randomize::char()->alpha()->generate();
echo PHP_EOL. "-----------------".PHP_EOL;

echo "--- GENERATING AN ALPHABETIC LOWERCASE CHAR" . PHP_EOL;
echo "--- Randomize::char()->alpha()->lower()->generate();". PHP_EOL;
echo "CHAR " . Randomize::char()->alpha()->lower()->generate();
echo PHP_EOL. "-----------------".PHP_EOL;

echo "--- GENERATING AN ALPHABETIC UPPERCASE CHAR" . PHP_EOL;
echo "--- Randomize::char()->alpha()->upper()->generate();". PHP_EOL;
echo "CHAR " . Randomize::char()->alpha()->upper()->generate();
echo PHP_EOL. "-----------------".PHP_EOL;

echo "--- GENERATING A ALPHANUMERIC CHAR" . PHP_EOL;
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
