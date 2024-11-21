<?php
require_once __DIR__ . "/vendor/autoload.php";

use HiFolks\RandoPhp\Randomize;

echo "--- Is he telling the truth? ".PHP_EOL;
$randomBool = Randomize::boolean()->generate();
echo ($randomBool) ? "Yes": "No" ;
echo PHP_EOL. "-----------------".PHP_EOL;

echo "--- Show me a proper boolean: ".PHP_EOL;
$randomBool = Randomize::boolean()->generate();
echo $randomBool;
echo PHP_EOL. "-----------------".PHP_EOL;