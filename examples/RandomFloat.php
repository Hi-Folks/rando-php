<?php

require __DIR__ . "/../vendor/autoload.php";

use HiFolks\RandoPhp\Randomize;

echo "--- GENERATING A FLOATING POINT NUMBER BETWEEN 0.0 AND 1.0 WITH UP TO 2 DECIMALS" . PHP_EOL;
echo "--- Randomize::float()->generate();". PHP_EOL;
echo "NUMBER " . Randomize::float()->generate();
echo PHP_EOL. "-----------------".PHP_EOL;

echo "--- GENERATING A FLOATING POINT NUMBER BETWEEN 0.0 AND 1.0 WITH UP TO 8 DECIMALS" . PHP_EOL;
echo "--- Randomize::float()->decimals(8)->generate();". PHP_EOL;
echo "NUMBER " . Randomize::float()->decimals(8)->generate();
echo PHP_EOL. "-----------------".PHP_EOL;

echo "--- GENERATING A NUMBER (float) BETWEEN RANGE FROM 1.2 TO 10.8" . PHP_EOL;
echo "--- Randomize::float()->range(1.2, 10.8)->generate();". PHP_EOL;
echo "FLOAT " . Randomize::float()->range(1.2, 10.8)->generate();
echo PHP_EOL. "-----------------".PHP_EOL;

echo "--- GENERATING A NUMBER (float) BETWEEN 10.0 AND 20.0" . PHP_EOL;
echo "--- Randomize::float()->min(10)->max(20)->generate();". PHP_EOL;
echo "FLOAT " . Randomize::float()->min(10)->max(20)->generate();
echo PHP_EOL. "-----------------".PHP_EOL;

echo "--- GENERATING A NUMBER (float) BETWEEN 1.2 AND 1.3 WITH UP TO 8 DECIMALS" . PHP_EOL;
echo "--- Randomize::float()->min(1.2)->max(1.3)->decimals(8)->generate();". PHP_EOL;
echo "FLOAT " . Randomize::float()->min(1.2)->max(1.3)->decimals(8)->generate();
echo PHP_EOL. "-----------------".PHP_EOL;
