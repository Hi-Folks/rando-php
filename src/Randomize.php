<?php

namespace HiFolks\RandoPhp;

use HiFolks\RandoPhp\Models\Char;
use HiFolks\RandoPhp\Models\Integer;
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
     * @return Integer
     */
    public static function integer()
    {
        return new Integer();
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
}
