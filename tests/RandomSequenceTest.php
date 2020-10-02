<?php

namespace HiFolks\RandoPhp\Tests;

use HiFolks\RandoPhp\Randomize;
use PHPUnit\Framework\TestCase;

class RandomSequenceTest extends TestCase
{
    /** @test */
    public function random_sequence()
    {
        $array = Randomize::sequence()->generate();
        $this->assertIsArray($array, "Check is array");

    }

    /** @test */
    public function random_count_sequence()
    {
        $array = Randomize::sequence()->count(7)->generate();
        $this->assertIsArray($array, "Check is array");
        $this->assertSame(7, count($array), "Check length array generated");

    }

    /** @test */
    public function random_rollthedice()
    {
        $count=10;
        $min=1;
        $max=6;
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

    /** @test */
    public function random_tombola()
    {
        $count=90;
        $min=1;
        $max=90;
        $array = Randomize::sequence()->integer()->min($min)->max($max)->noDuplicates()->count($count)->generate();
        $this->assertIsArray($array, "Check is array");
        $this->assertSame($count, count($array), "Check length array generated");
        foreach ($array as $item) {
            $this->assertGreaterThanOrEqual(1, $item, "Greater than " . $min);
            $this->assertLessThanOrEqual(90, $item, "Less than " . $min);
        }

        $this->assertSame($count, count(array_unique($array)), "Check uniqueness");




    }

    /** @test */
    public function random_sequence_implode() {
        $min=1;
        $max=10;
        $count=3;
        $string = Randomize::sequence()->integer()->min($min)->max($max)->implode()->count($count)->generate();
        $this->assertIsString($string);

    }





}
