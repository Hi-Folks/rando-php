<?php

namespace HiFolks\RandoPhp\Models;

use HiFolks\RandoPhp\Randomize;

class LatLong
{
    private string $format = "array";

    /**
     * Set output format to array.
     */
    public function asArray(): self
    {
        $this->format = "array";
        return $this;
    }

    /**
     * Set output format to object.
     */
    public function asObject(): self
    {
        $this->format = "object";
        return $this;
    }

    /**
     * Set output format to latitude.
     */
    public function asLatitude(): self
    {
        $this->format = "latitude";
        return $this;
    }

    /**
     * Set output format to longitude.
     */
    public function asLongitude(): self
    {
        $this->format = "longitude";
        return $this;
    }

    /**
     * Generates a latitude / longitude coordinate
     *
     * @return float[]|object|float
     */
    public function generate()
    {
        $latitude = Randomize::float()->range(-90.0, 90.0)->decimals(6)->generate();
        $longitude = Randomize::float()->range(-180.0, 180.0)->decimals(6)->generate();
        $result = [];
        switch ($this->format) {
            case "array":
                $result = [$latitude, $longitude];
                break;
            case "object":
                $result = new \stdClass();
                $result->latitude = $latitude;
                $result->longitude = $longitude;
                break;
            case "latitude":
                $result = $latitude;
                break;
            case "longitude":
                $result = $longitude;
                break;
        }
        return $result;
    }
}
