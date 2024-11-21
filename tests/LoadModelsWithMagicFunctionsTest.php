<?php

namespace HiFolks\RandoPhp\Tests;

use HiFolks\RandoPhp\Exceptions\ModelNotFoundException;
use HiFolks\RandoPhp\Models;
use HiFolks\RandoPhp\Models\LatLong;
use HiFolks\RandoPhp\Randomize;
use PHPUnit\Framework\TestCase;

class LoadModelsWithMagicFunctionsTest extends TestCase
{
    /** @test */
    public function load_boolean_test(): void
    {
        $boolean = Randomize::boolean();
        $this->assertInstanceOf(Models\Boolean::class, $boolean);
    }

    /** @test */
    public function load_integer_test(): void
    {
        $integer = Randomize::integer();
        $this->assertInstanceOf(Models\Integer::class, $integer);
    }

    /** @test */
    public function load_float_test(): void
    {
        $floatModel = Randomize::float();
        $this->assertInstanceOf(Models\FloatModel::class, $floatModel);
    }

    /** @test */
    public function load_byte_test(): void
    {
        $byte = Randomize::byte();
        $this->assertInstanceOf(Models\Byte::class, $byte);
    }

    /** @test */
    public function load_sequence_test(): void
    {
        $sequence = Randomize::sequence();
        $this->assertInstanceOf(Models\Sequence::class, $sequence);
    }

    /** @test */
    public function load_datetime_test(): void
    {
        $dateTime = Randomize::datetime();
        $this->assertInstanceOf(Models\DateTime::class, $dateTime);
    }

    /** @test */
    public function load_char_test(): void
    {
        $char = Randomize::char();
        $this->assertInstanceOf(Models\Char::class, $char);
    }

    /** @test */
    public function load_latlong_test(): void
    {
        $latLong = Randomize::latlong();
        $this->assertInstanceOf(Models\LatLong::class, $latLong);
    }

    /** @test */
    public function model_not_found_exception_test(): void
    {
        $this->expectException(ModelNotFoundException::class);
        Randomize::nonExistingModel();
    }
}
