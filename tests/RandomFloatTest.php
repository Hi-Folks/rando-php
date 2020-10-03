<?php

namespace HiFolks\RandoPhp\Tests;

use HiFolks\RandoPhp\Randomize;
use InvalidArgumentException;
use LogicException;
use PHPUnit\Framework\TestCase;

class RandomFloatTest extends TestCase
{
    /** @test */
    public function random_float(): void
    {
        $number = Randomize::float()->generate();

        $this->assertIsFloat($number);
        $this->assertGreaterThanOrEqual(0, $number);
        $this->assertLessThan(1, $number);

        // There needs to be 4 charactes when converted to string (0.xx)
        $this->assertEquals(strlen((string) $number), 4);
    }

    /** @test */
    public function random_float_min_max_decimals(): void 
    {
        $number = Randomize::float()->min(5)->max(20)->decimals(5)->generate();
        $floating = round($number - (int) $number, 5);

        $this->assertIsFloat($number);
        $this->assertGreaterThanOrEqual(5, $number);
        $this->assertLessThan(20, $number);
        $this->assertEquals(7, strlen($floating));

        $catched = false;

        try {
            $number = Randomize::float()->min(10)->max(10)->decimals(-5)->generate();
        } 
        catch (InvalidArgumentException $exception) {
            $this->assertEquals("The number of decimals cannot be negative.", $exception->getMessage());
            $catched = true;
        }

        $this->assertTrue($catched);


        $catched = false;

        try {
            $number = Randomize::float()->min(10)->max(1)->decimals(1)->generate();
        }
        catch (LogicException $exception) {
            $this->assertEquals("The specified max is <= than the specified min.", $exception->getMessage());
            $catched = true;
        }

        $this->assertTrue($catched);

        $number = Randomize::float()->min(0)->max(1)->decimals(0)->generate();

        $this->assertIsFloat($number);
        $this->assertEquals(1, strlen($number));

        for ($i = 1; $i < 15; $i++) {
            $number = Randomize::float()->min(0)->max(1)->decimals($i)->generate();

            $this->assertIsFloat($number);
            $this->assertEquals($i + 2, strlen($number));
        }
    }
}
