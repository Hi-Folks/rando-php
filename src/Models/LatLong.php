<?php

namespace HiFolks\RandoPhp\Models;

use HiFolks\RandoPhp\Randomize;

class LatLong
{
    /**
     * Generates an array with latitude and longitude
     *
     * @return array
     */
    public function array() : array
    {
        return array($this->justLatitude(), $this->justLongitude());
    }

    /**
     * Generates an object with latitude and longitude
     *
     * @return object
     */
    public function object() : object
    {
        $object = new \stdClass;
        $object->latitude = $this->justLatitude();
        $object->longitude = $this->justLongitude();
        return $object;
    }

    /**
     * Generates a latitude value
     *
     * @return float
     */
    public function justLatitude() : float
    {
        return Randomize::float()->range(-90.0, 90.0)->decimals(6)->generate();
    }

    /**
     * Generates a longitude value
     *
     * @return float
     */
    public function justLongitude() : float
    {
        return Randomize::float()->range(-180.0, 180.0)->decimals(6)->generate();
    }

    /**
     * Generates an array with latitude and longitude
     *
     * @return array
     */
    public function generate() : array
    {
        return $this->array();
    }
}
