<?php

namespace HiFolks\RandoPhp\Tests;

use HiFolks\RandoPhp\Randomize;
use PHPUnit\Framework\TestCase;

class RandomCharsTest extends TestCase
{
    /**
     * @test
     */
    public function random_sequence()
    {
        $string = Randomize::chars()->generate();
        $this->assertIsString($string, "Check is String");
        $this->assertEquals(10, strlen($string), "Length of String");
    }

    /**
     * @test
     */
    public function random_count_sequence()
    {
        $string = Randomize::chars()->count(7)->generate();
        $this->assertIsString($string, "Check is String");
        $this->assertSame(7, strlen($string), "Check length String generated");
        $string = Randomize::chars(8)->generate();
        $this->assertIsString($string, "Check is String");
        $this->assertSame(8, strlen($string), "Check length String generated <" . $string . ">");
    }

    /**
     * @test
     */
    public function random_char_sequence()
    {
        $string = Randomize::chars()->generate();
        $this->assertIsString($string, "Char sequence check is String");
    }

    /**
     * @test
     */
    public function random_no_duplicate_char_sequence()
    {
        $string = Randomize::chars(7)->noDuplicates()->generate();
        $arrayUnique = array_unique(str_split($string));
        $this->assertEquals(7, count($arrayUnique), "No duplicate char sequence array generated");

        $string = Randomize::chars(20)->noDuplicates()->generate();
        $arrayUnique = array_unique(str_split($string));
        $this->assertEquals(20, count($arrayUnique), "No duplicate char sequence array generated");
    }

    /**
     * @test
     */
    public function random_numeric_char_sequence()
    {
        $len = 5;
        $string = Randomize::chars()->numeric()->count($len)->generate();
        $this->assertIsString($string, "Is String");
        $this->assertSame($len, strlen($string), "Is right len");
        $this->assertTrue(ctype_digit($string), "Check for Numeric character " . $string);

        $string = Randomize::chars()->alpha()->count($len)->generate();
        $this->assertIsString($string, "Is String");
        $this->assertSame($len, strlen($string), "Is right len");
        $this->assertTrue(ctype_alpha($string), "Check for Alpha character " . $string);

        $string = Randomize::chars()->alphanumeric()->count($len)->generate();
        $this->assertIsString($string, "Is String");
        $this->assertSame($len, strlen($string), "Is right len");
        $this->assertTrue(ctype_alnum($string), "Check for AlphaNumeric character : " . $string);

        $string = Randomize::chars()->alphaUpperCase()->count($len)->generate();
        $this->assertIsString($string, "Is String");
        $this->assertSame($len, strlen($string), "Is right len");
        $this->assertTrue(ctype_upper($string), "Check for Upper character : " . $string);

        $string = Randomize::chars()->alphaLowerCase()->count($len)->generate();
        $this->assertIsString($string, "Is String");
        $this->assertSame($len, strlen($string), "Is right len");
        $this->assertTrue(ctype_lower($string), "Check for Lower character : " . $string);
    }

    /**
     * @test
     */
    public function random_special_characters()
    {
        $string = Randomize::chars(20)->specialCharacters()->alpha()->generate();
        $this->assertEquals(20, strlen($string), "String with special characters");
    }
}
