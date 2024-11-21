<?php
require_once __DIR__ . "/vendor/autoload.php";

use HiFolks\RandoPhp\Randomize;

echo "--- Random date default ".PHP_EOL;
$randomDate = Randomize::datetime()->generate();
echo $randomDate;
echo PHP_EOL. "-----------------".PHP_EOL;

echo "--- Random date min max ".PHP_EOL;
$randomDate = Randomize::datetime()->min('01-01-2020')->max('10-01-2020')->generate();
echo $randomDate;
echo PHP_EOL. "-----------------".PHP_EOL;

echo "--- Max could be now ".PHP_EOL;
$randomDate = Randomize::datetime()->min('01-10-2020')->max('now')->generate();
echo $randomDate;
echo PHP_EOL. "-----------------".PHP_EOL;

echo "--- Use range ".PHP_EOL;
$randomDate = Randomize::datetime()->range('01-10-2020', '10-10-2020')->generate();
echo $randomDate;
echo PHP_EOL. "-----------------".PHP_EOL;

echo "--- Different format ".PHP_EOL;
$randomDate = Randomize::datetime()->format('d-M-Y')->generate();
echo $randomDate;
echo PHP_EOL. "-----------------".PHP_EOL;