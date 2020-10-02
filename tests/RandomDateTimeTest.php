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

    /** @test */
    public function random_datetime_format()
    {
        $year = Randomize::datetime()->min('01-10-2020')->max('10-10-2020')->format("Y")->generate();
        $this->assertEquals("2020", $year );
    }

    /** @test */
    public function random_datetime_range_format()
    {
        $month = Randomize::datetime()->range('01-10-2020', '30-10-2020')->format("m")->generate();
        $this->assertEquals("10", $month );
    }

}
