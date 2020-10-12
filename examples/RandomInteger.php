<?php
require_once "./vendor/autoload.php";

use HiFolks\RandoPhp\Randomize;

echo "--- GENERATING A NUMBER BETWEEN 0 AND 100" . PHP_EOL;
echo "--- Randomize::integer()->generate();". PHP_EOL;
echo "INTEGER " . Randomize::integer()->generate();
echo PHP_EOL. "-----------------".PHP_EOL;

echo "--- GENERATING A NUMBER (integer) WITH RANGE FROM 1 TO 10" . PHP_EOL;
echo "--- Randomize::integer()->range(1,10)->generate();". PHP_EOL;
echo "INTEGER " . Randomize::integer()->range(1,10)->generate();
echo PHP_EOL. "-----------------".PHP_EOL;

echo "--- GENERATING A NUMBER BETWEEN 10 AND 20" . PHP_EOL;
echo "--- Randomize::integer()->min(10)->max(20)->generate();". PHP_EOL;
echo "INTEGER " . Randomize::integer()->min(10)->max(20)->generate();
echo PHP_EOL. "-----------------".PHP_EOL;

