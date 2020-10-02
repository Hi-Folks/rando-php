<?php

namespace HiFolks\RandoPhp;

use HiFolks\RandoPhp\Models\Char;
use HiFolks\RandoPhp\Models\Integer as ModelInt;
use HiFolks\RandoPhp\Models\Boolean;
use HiFolks\RandoPhp\Models\DateTime;
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
}
