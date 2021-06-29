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
        $this->assertEquals("2020", $year);
    }

    /** @test */
    public function random_datetime_range_format()
    {
        $month = Randomize::datetime()->range('01-10-2020', '30-10-2020')->format("m")->generate();
        $this->assertSame("10", $month, "Extracting the right month");

        $month = Randomize::datetime()->range('01-10-2020', '09-10-2020')->format("m")->generate();
        $this->assertSame("10", $month, "Extracting the right month 2");

        $month = Randomize::datetime()->range('01-10-2020 00:00:00', '01-10-2020 12:00:00')->format("m")->generate();
        $this->assertSame("10", $month, "Extracting the right month 2");
        $day = Randomize::datetime()->range('01-10-2020 00:00:00', '01-10-2020 12:00:00')->format("d")->generate();
        $this->assertSame("01", $day, "Extracting the right day");
        $year = Randomize::datetime()->range('01-01-2020', 'now')->format("Y")->generate();
        $this->assertIsString($year, "Generated Y is a string");
        $this->assertSame(strlen($year), 4, "Generated Y is 4 chars");
    }
}
