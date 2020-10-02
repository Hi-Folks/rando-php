<?php

namespace HiFolks\RandoPhp\Tests;

use HiFolks\RandoPhp\Randomize;
use PHPUnit\Framework\TestCase;

class RandomDateTimeTest extends TestCase
{
    /** @test */
    public function random_datetime()
    {
        $datetime = Randomize::datetime()->generate();
        $this->assertIsString($datetime, "Is String");
    }
    /** @test */
    public function random_datetime_min_max()
    {
        $datetime = Randomize::datetime()->min('01-10-2020')->max('10-10-2020')->generate();
        $this->assertIsString($datetime, "Min/Max working");
    }

}