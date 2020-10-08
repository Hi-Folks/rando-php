<?php

namespace HiFolks\RandoPhp\Tests;

use HiFolks\RandoPhp\Randomize;
use PHPUnit\Framework\TestCase;

class RandomLatLongTest extends TestCase
{
    /**
     * @test
     */
    public function random_latlong_array(): void
    {
        $latlong = Randomize::latlong()->asArray()->generate();
        $this->assertIsArray($latlong);
        // latitude
        $this->assertGreaterThanOrEqual(-90.0, $latlong[0]);
        $this->assertLessThanOrEqual(90.0, $latlong[0]);
        // longitude
        $this->assertGreaterThanOrEqual(-180.0, $latlong[1]);
        $this->assertLessThanOrEqual(180.0, $latlong[1]);
    }

    /**
     * @test
     */
    public function random_latlong_object(): void
    {
        $latlongObject = Randomize::latlong()->asObject()->generate();
        $this->assertIsObject($latlongObject);
        // latitude
        $this->assertGreaterThanOrEqual(-90.0, $latlongObject->latitude);
        $this->assertLessThanOrEqual(90.0, $latlongObject->latitude);
        // longitude
        $this->assertGreaterThanOrEqual(-180.0, $latlongObject->longitude);
        $this->assertLessThanOrEqual(180.0, $latlongObject->longitude);
    }

    /**
     * @test
     */
    public function random_latitude(): void
    {
        $lat = Randomize::latlong()->asLatitude()->generate();
        $this->assertGreaterThanOrEqual(-90.0, $lat);
        $this->assertLessThanOrEqual(90.0, $lat);
    }

    /**
     * @test
     */
    public function random_longitude(): void
    {
        $long = Randomize::latlong()->asLongitude()->generate();
        $this->assertGreaterThanOrEqual(-180.0, $long);
        $this->assertLessThanOrEqual(180.0, $long);
    }

    /**
     * @test
     */
    public function random_latlong(): void
    {
        $latlong = Randomize::latlong()->generate();
        $this->assertIsArray($latlong);
        // latitude
        $this->assertGreaterThanOrEqual(-90.0, $latlong[0]);
        $this->assertLessThanOrEqual(90.0, $latlong[0]);
        // longitude
        $this->assertGreaterThanOrEqual(-180.0, $latlong[1]);
        $this->assertLessThanOrEqual(180.0, $latlong[1]);
    }
}
