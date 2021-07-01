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

printLn("GENERATING A STRING OF NUMERIC CHARS");
printLn("Randomize::chars(16)->numeric()->generate()");
printLn("CHARS " . Randomize::chars(16)->numeric()->generate());
insertBreak('-');

printLn("GENERATING A STRING OF ALPHABETIC CHARS");
printLn("Randomize::chars(16)->alpha()->generate()");
printLn("CHARS " . Randomize::chars(16)->alpha()->generate());
insertBreak('-');

printLn("GENERATING A STRING OF ALPHANUMERIC CHARS");
printLn("Randomize::chars(16)->alphanumeric()->generate()");
printLn("CHARS " . Randomize::chars(16)->alphanumeric()->generate() );
insertBreak('-');

printLn("GENERATING A STRING OF 20 ALPHA UNIQUE CHARS");
printLn("Randomize::chars(20)->alpha()->unique()->generate()");
printLn("CHARS " . Randomize::chars(20)->alpha()->unique()->generate());
insertBreak('-');

printLn("GENERATING A STRING OF 20 ALPHA low case UNIQUE CHARS");
printLn("Randomize::chars(20)->alphaLowerCase()->unique()->generate()");
printLn("CHARS " . Randomize::chars(20)->alphaLowerCase()->unique()->generate());
insertBreak('-');

printLn("GENERATING A STRING OF 20 ALPHA upper case UNIQUE CHARS");
printLn("Randomize::chars(20)->alphaUpperCase()->unique()->generate()");
printLn("SEQUENCE " . Randomize::chars(20)->alphaUpperCase()->unique()->generate());
insertBreak('-');

printLn("GENERATING A STRING OF 20 ALPHA low case CHARS");
printLn("Randomize::chars(20)->alphaLowerCase()->generate()");
printLn("SEQUENCE " . Randomize::chars(20)->alphaLowerCase()->generate());
insertBreak('-');

printLn("GENERATING A STRING OF 20 ALPHA upper case CHARS");
printLn("Randomize::chars(20)->alphaUpperCase()->generate()");
printLn("SEQUENCE " . Randomize::chars(20)->alphaUpperCase()->generate());
insertBreak('-');

printLn("GENERATING A STRING OF 20 special characters");
printLn("Randomize::chars(20)->specialCharacters()->alpha()->generate()");
printLn("SEQUENCE " . Randomize::chars(20)->alpha()->specialCharacters()->generate());
insertBreak('-');
