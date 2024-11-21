<?php
require_once __DIR__ . "/vendor/autoload.php";

use HiFolks\RandoPhp\Randomize;

function printLn(string $str): void
{
    echo $str . PHP_EOL;
}

function insertBreak($char, $duplicates = 15): void
{
    echo str_repeat($char, $duplicates) . PHP_EOL;
}

// Min=1 , Max=90,  90 numbers and with No Duplicates, it returns an array
$randomTombola = Randomize::sequence()->min(1)->max(90)->count(90)->noDuplicates()->generate();

printLn("GENERATING A SEQUENCE OF INTEGERS");
printLn("Min=1 , Max=90,  90 numbers and with No Duplicates, it returns an array");
printLn("Randomize::sequence()->min(1)->max(90)->count(90)->noDuplicates()->generate()");
printLn("SEQUENCE " . print_r($randomTombola, true));
insertBreak('-');

// Min=1 , Max=90,  90 numbers and with No Duplicates, it returns a string with numbers listed and separated by semicolon
$randomTombola = Randomize::sequence()->min(1)->max(90)->count(90)->implode()->noDuplicates()->generate();

printLn("GENERATING A SEQUENCE OF INTEGERS");
printLn("Min=1 , Max=90,  90 numbers and with No Duplicates, it returns a string with numbers listed and separated by semicolons");
printLn("Randomize::sequence()->min(1)->max(90)->count(90)->implode()->noDuplicates()->generate()");
printLn("SEQUENCE " . $randomTombola);
insertBreak('-');
