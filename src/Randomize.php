<?php

namespace HiFolks\RandoPhp;

use HiFolks\RandoPhp\Models\Char;
use HiFolks\RandoPhp\Models\Integer as ModelInt;
use HiFolks\RandoPhp\Models\Boolean as ModelBool;
use HiFolks\RandoPhp\Models\DateTime;
use HiFolks\RandoPhp\Models\Byte;
use HiFolks\RandoPhp\Models\FloatModel;
use HiFolks\RandoPhp\Models\Sequence;
use HiFolks\RandoPhp\Models\LatLong;

class Randomize
{

    /**
     * Generates random boolean
     *
     * @return ModelBool
     */
    public static function boolean()
    {
        return new ModelBool();
    }

    /**
     * Generates random numbers
     *
     * @return ModelInt
     */
    public static function integer()
    {
        return new ModelInt();
    }

    /**
     * Generates random floating point numbers
     *
     * @return FloatModel
     */
    public static function float()
    {
        return new FloatModel();
    }

    /**
     * Generates random byte (32 bit), something in hexadecimal format [0-f][0-f]
     *
     * @return Byte
     */
    public static function byte()
    {
        return new Byte();
    }

    public static function sequence()
    {
        return new Sequence();
    }

    /**
     * Generate random date (datetime), you can pass format option default Y-m-d H:i:s
     */
    public static function datetime()
    {
        return new Datetime();
    }

    public static function char()
    {
        return new Char();
    }

    /**
     * Generates random latitude / longitude coordinates in both array and object form.
     *
     * @return LatLong
     */
    public static function latlong() : LatLong
    {
        return new LatLong();
    }
}
