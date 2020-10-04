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

        // There needs to be 4 characters max when converted to string (0.xx)
        $this->assertLessThanOrEqual(4, strlen((string) $number), "$number is 4 or less chars long (0.xx)");
    }

    /** @test */
    public function random_float_min_max_types_validation(): void
    {
        // This should be OK
        Randomize::float()->min(10)->max(20);

        $catched = false;

        try {
            Randomize::float()->min("string");
        }
        catch (InvalidArgumentException $exception) {
            $catched = true;
            $this->assertEquals("The min argument must be either an integer or a float.", $exception->getMessage());
        }

        $this->assertTrue($catched);

        $catched = false;

        try {
            Randomize::float()->max("string");
        }
        catch (InvalidArgumentException $exception) {
            $catched = true;
            $this->assertEquals("The max argument must be either an integer or a float.", $exception->getMessage());
        }

        $this->assertTrue($catched);

        $catched = false;

        try {
            Randomize::float()->range(0, "string");
        }
        catch (InvalidArgumentException $exception) {
            $catched = true;
            $this->assertEquals("The max argument must be either an integer or a float.", $exception->getMessage());
        }

        $this->assertTrue($catched);

        $catched = false;

        try {
            Randomize::float()->range("string", 0);
        }
        catch (InvalidArgumentException $exception) {
            $catched = true;
            $this->assertEquals("The min argument must be either an integer or a float.", $exception->getMessage());
        }

        $this->assertTrue($catched);

        $catched = false;

        try {
            Randomize::float()->range("string", "another string");
        }
        catch (InvalidArgumentException $exception) {
            $catched = true;
            $this->assertEquals("The min argument must be either an integer or a float.", $exception->getMessage());
        }

        $this->assertTrue($catched);

        $number = Randomize::float()->min(0.5)->max(1.5)->decimals(1)->generate();

        $this->assertLessThanOrEqual(1.5, $number);
        $this->assertGreaterThanOrEqual(0.5, $number);

        $number = Randomize::float()->min(0.5)->max(1.5)->decimals(1)->generate();

        $this->assertLessThanOrEqual(1.5, $number);
        $this->assertGreaterThanOrEqual(0.5, $number);

        $number = Randomize::float()->min(0.5)->max(1.5)->decimals(3)->generate();

        $this->assertLessThanOrEqual(1.5, $number);
        $this->assertGreaterThanOrEqual(0.5, $number);
    }

    /** @test */
    public function random_float_min_max_decimals(): void 
    {
        $number = Randomize::float()->min(5)->max(20)->decimals(5)->generate();
        $floating = round($number - (int) $number, 5);

        $this->assertIsFloat($number);
        $this->assertGreaterThanOrEqual(5, $number);
        $this->assertLessThan(20, $number);
        $this->assertLessThanOrEqual(7, strlen($floating), "$floating length is 7 or less (x.xxxxx)");

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
        $this->assertLessThanOrEqual(1, strlen($number), "$number length is 1");

        for ($i = 1; $i < 20; $i++) {
            $number = Randomize::float()->min(0)->max(1)->decimals($i)->generate();
            $pattern = "x." . str_repeat("x", $i);
            $floating = $number - floor($number);

            $this->assertIsFloat($number);
            $this->assertLessThanOrEqual(strlen($pattern), strlen($floating), "$floating matches $pattern");
        }
    }
}
