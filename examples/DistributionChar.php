<?php

require_once __DIR__ . "/vendor/autoload.php";

use HiFolks\RandoPhp\Randomize;
$count = 10000;
$results = [];
echo "--- GENERATING {$count} NUMERIC CHARS" . PHP_EOL;

for ($i = 0; $i < $count; $i++) {
    $item = Randomize::char()->alphanumeric()->generate();
    $results[$item] = (array_key_exists($item, $results)) ? $results[$item] + 1 : 0;
}
ksort($results);
print_r($results);
