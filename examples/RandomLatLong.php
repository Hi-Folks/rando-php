<?php

require __DIR__ . "/../vendor/autoload.php";

use HiFolks\RandoPhp\Randomize;

echo "--- GENERATING A COORDINATE IN ARRAY FORMAT" . PHP_EOL;
echo "--- Randomize::latlong()->asArray()->generate();". PHP_EOL;
echo "--- OR SIMPLY" . PHP_EOL;
echo "--- Randomize::latlong()->generate();". PHP_EOL;
print_r(Randomize::latlong()->asArray()->generate());
echo "-----------------".PHP_EOL;

echo "--- GENERATING A COORDINATE IN OBJECT FORMAT" . PHP_EOL;
echo "--- Randomize::latlong()->asObject()->generate();". PHP_EOL;
print_r(Randomize::latlong()->asObject()->generate());
echo "-----------------".PHP_EOL;

echo "--- GENERATING A LATITUDE VALUE IN FLOAT FORMAT" . PHP_EOL;
echo "--- Randomize::latlong()->asLatitude()->generate();". PHP_EOL;
echo "NUMBER " . Randomize::latlong()->asLatitude()->generate();
echo PHP_EOL. "-----------------".PHP_EOL;

echo "--- GENERATING A LONGITUDE VALUE IN FLOAT FORMAT" . PHP_EOL;
echo "--- Randomize::latlong()->asLongitude()->generate();". PHP_EOL;
echo "NUMBER " . Randomize::latlong()->asLongitude()->generate();
echo PHP_EOL. "-----------------".PHP_EOL;
