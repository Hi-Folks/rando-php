<?php
require_once "./vendor/autoload.php";

use HiFolks\RandoPhp\Randomize;

function printLn($str)
{
  echo $str . PHP_EOL;
}

function insertBreak($char, $duplicates = 15)
{
  echo str_repeat($char, $duplicates) . PHP_EOL;
}

printLn("GENERATING A SEQUENCE OF NUMERIC CHARS");
printLn("Randomize::sequence()->chars()->numeric()->count(10)->asString()->generate()");
printLn("SEQUENCE " . Randomize::sequence()->chars()->numeric()->count(10)->asString()->generate());
insertBreak('-');

printLn("GENERATING A SEQUENCE OF ALPHABETIC CHARS");
printLn("Randomize::sequence()->chars()->alpha()->count(10)->asString()->generate()");
printLn("SEQUENCE " . Randomize::sequence()->chars()->alpha()->count(10)->asString()->generate());
insertBreak('-');

printLn("GENERATING A SEQUENCE OF ALPHANUMERIC CHARS");
printLn("Randomize::sequence()->chars()->alphanumeric()->count(10)->asString()->generate()");
printLn("SEQUENCE " . Randomize::sequence()->chars()->alphanumeric()->count(10)->asString()->generate());
insertBreak('-');

printLn("GENERATING A SEQUENCE OF 20 ALPHA UNIQUE CHARS");
printLn("Randomize::sequence()->chars()->alpha()->unique()->count(20)->asString()->generate()");
printLn("SEQUENCE " . Randomize::sequence()->chars()->alpha()->unique()->count(20)->asString()->generate());
insertBreak('-');
