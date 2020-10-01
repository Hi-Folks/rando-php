<?php
require_once "./vendor/autoload.php";

use HiFolks\RandoPhp\Randomize;

echo "--- GENERATING A NUMERIC CHAR" . PHP_EOL;
echo "--- Randomize::char()->numeric()->generate();". PHP_EOL;
echo "NUMBER " . Randomize::char()->numeric()->generate();
echo PHP_EOL. "-----------------".PHP_EOL;

echo "--- GENERATING A ALPHABETIC CHAR" . PHP_EOL;
echo "--- Randomize::char()->alpha()->generate();". PHP_EOL;
echo "NUMBER " . Randomize::char()->alpha()->generate();
echo PHP_EOL. "-----------------".PHP_EOL;

echo "--- GENERATING A ALPHANUMERIC CHAR" . PHP_EOL;
echo "--- Randomize::char()->alphanumeric()->generate();". PHP_EOL;
echo "NUMBER " . Randomize::char()->alphanumeric()->generate();
echo PHP_EOL. "-----------------".PHP_EOL;
