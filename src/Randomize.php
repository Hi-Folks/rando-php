<?php

namespace HiFolks\RandoPhp;

use HiFolks\RandoPhp\Models\Char;
use HiFolks\RandoPhp\Models\DateTime;
use HiFolks\RandoPhp\Models\Integer as ModelInt;
use HiFolks\RandoPhp\Models\Boolean;
use HiFolks\RandoPhp\Models\Byte;
use HiFolks\RandoPhp\Models\Sequence;

class Randomize
{

    /**
     * Generates random boolean
     *
     * @return Boolean
     */
    public static function boolean()
    {
        return new Boolean();
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

    public static function char()
    {
        return new Char();
    }

    public static function datetime($format = 'Y-m-d H:i:s') {
        return new DateTime($format);
    }
}
