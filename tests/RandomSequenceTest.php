<?php

namespace HiFolks\RandoPhp\Tests;

use HiFolks\RandoPhp\Randomize;
use PHPUnit\Framework\TestCase;

class RandomSequenceTest extends TestCase
{
    /**
     *
     *
     * @test
     */
    public function random_sequence(): void
    {
        $array = Randomize::sequence()->generate();
        $this->assertIsArray($array, "Check is array");
    }

    /**
     *
     *
     * @test
     */
    public function random_count_sequence(): void
    {
        $array = Randomize::sequence()->count(7)->generate();
        $this->assertIsArray($array, "Check is array");
        $this->assertSame(7, count($array), "Check length array generated");
    }

    /**
     *
     *
     * @test
     */
    public function random_char_sequence(): void
    {
        $array = Randomize::sequence()->chars()->generate();
        $this->assertIsArray($array, "Char sequence check is array");
    }

    /**
     *
     *
     * @test
     */
    public function random_count_char_sequence(): void
    {
        $array = Randomize::sequence()->chars()->count(7)->generate();
        $this->assertIsArray($array, "Char sequence check is array");
        $this->assertEquals(7, count($array), "Char sequence check length array generated");
    }

    /**
     * @test
     */
    public function random_no_duplicate_char_sequence(): void
    {
        $array = Randomize::sequence()->chars()->count(7)->noDuplicates()->generate();
        $arrryUnique = array_unique($array);
        $this->assertEquals(7, count($arrryUnique), "No duplicate char sequence array generated");
    }

    /**
     * @test
     */
    public function random_numeric_char_sequence(): void
    {
        $len = 5;
        $string = Randomize::sequence()->chars()->asString()->numeric()->count($len)->generate();
        $this->assertIsString($string, "Is String");
        $this->assertSame($len, strlen($string), "Is right len");
        $this->assertTrue(ctype_digit($string), "Check for Numeric character " . $string);

        $string = Randomize::sequence()->chars()->asString()->alpha()->count($len)->generate();
        $this->assertIsString($string, "Is String");
        $this->assertSame($len, strlen($string), "Is right len");
        $this->assertTrue(ctype_alpha($string), "Check for Alpha character " . $string);

        $string = Randomize::sequence()->chars()->asString()->alphanumeric()->count($len)->generate();
        $this->assertIsString($string, "Is String");
        $this->assertSame($len, strlen($string), "Is right len");
        $this->assertTrue(ctype_alnum($string), "Check for AlphaNumeric character : " . $string);

        $string = Randomize::sequence()->chars()->asString()->alphaUpperCase()->count($len)->generate();
        $this->assertIsString($string, "Is String");
        $this->assertSame($len, strlen($string), "Is right len");
        $this->assertTrue(ctype_upper($string), "Check for Upper character : " . $string);

        $string = Randomize::sequence()->chars()->asString()->alphaLowerCase()->count($len)->generate();
        $this->assertIsString($string, "Is String");
        $this->assertSame($len, strlen($string), "Is right len");
        $this->assertTrue(ctype_lower($string), "Check for Lower character : " . $string);
    }



    /**
     *
     *
     * @test
     */
    public function random_rollthedice(): void
    {
        $count = 10;
        $min = 1;
        $max = 6;
        $array = Randomize::sequence()->min($min)->max($max)->count($count)->generate();
        $this->assertIsArray($array, "Check is array");
        $this->assertSame($count, count($array), "Check length array generated");
        foreach ($array as $item) {
            $this->assertGreaterThanOrEqual(1, $item, "Greater than " . $min);
            $this->assertLessThanOrEqual(6, $item, "Less than " . $min);
        }

        // the same as before, forcing integer items
        $array = Randomize::sequence()->min($min)->max($max)->count($count)->generate();
        $this->assertIsArray($array, "Check is array");
        $this->assertSame($count, count($array), "Check length array generated");
        foreach ($array as $item) {
            $this->assertGreaterThanOrEqual(1, $item, "Greater than " . $min);
            $this->assertLessThanOrEqual(6, $item, "Less than " . $min);
        }

        $array = Randomize::sequence()->min($min)->max($max)->count($count)->allowDuplicates()->generate();
        $this->assertIsArray($array, "Check is array");
        $this->assertSame($count, count($array), "Check length array generated");
        foreach ($array as $item) {
            $this->assertGreaterThanOrEqual(1, $item, "Greater than " . $min);
            $this->assertLessThanOrEqual(6, $item, "Less than " . $min);
        }
    }

    /**
     *
     *
     * @test
     */
    public function random_tombola(): void
    {
        $count = 90;
        $min = 1;
        $max = 90;
        $array = Randomize::sequence()->integer()->min($min)->max($max)->noDuplicates()->count($count)->generate();
        $this->assertIsArray($array, "Check is array");
        $this->assertSame($count, count($array), "Check length array generated");
        foreach ($array as $item) {
            $this->assertGreaterThanOrEqual(1, $item, "Greater than " . $min);
            $this->assertLessThanOrEqual(90, $item, "Less than " . $min);
        }

        $this->assertSame($count, count(array_unique($array)), "Check uniqueness");
    }

    /**
     *
     *
     * @test
     */
    public function random_sequence_implode(): void
    {
        $min = 1;
        $max = 10;
        $count = 3;
        $string = Randomize::sequence()->integer()->min($min)->max($max)->implode()->count($count)->generate();
        $this->assertIsString($string);
    }

    /**
     *
     *
     * @test
     */
    public function random_sequence_asString(): void
    {
        $min = 1;
        $max = 10;
        $count = 3;
        $string = Randomize::sequence()->integer()->min($min)->max($max)->asString()->count($count)->generate();
        $this->assertIsString($string);
    }
}
