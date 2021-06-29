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
    public function load_boolean_test()
    {
        $model = Randomize::boolean();
        $this->assertInstanceOf(Models\Boolean::class, $model);
    }

    /** @test */
    public function load_integer_test()
    {
        $model = Randomize::integer();
        $this->assertInstanceOf(Models\Integer::class, $model);
    }

    /** @test */
    public function load_float_test()
    {
        $model = Randomize::float();
        $this->assertInstanceOf(Models\FloatModel::class, $model);
    }

    /** @test */
    public function load_byte_test()
    {
        $model = Randomize::byte();
        $this->assertInstanceOf(Models\Byte::class, $model);
    }

    /** @test */
    public function load_sequence_test()
    {
        $model = Randomize::sequence();
        $this->assertInstanceOf(Models\Sequence::class, $model);
    }

    /** @test */
    public function load_datetime_test()
    {
        $model = Randomize::datetime();
        $this->assertInstanceOf(Models\DateTime::class, $model);
    }

    /** @test */
    public function load_char_test()
    {
        $model = Randomize::char();
        $this->assertInstanceOf(Models\Char::class, $model);
    }

    /** @test */
    public function load_latlong_test()
    {
        $model = Randomize::latlong();
        $this->assertInstanceOf(Models\LatLong::class, $model);
    }

    /** @test */
    public function model_not_found_exception_test()
    {
        $this->expectException(ModelNotFoundException::class);
        $model = Randomize::nonExistingModel();
    }
}
