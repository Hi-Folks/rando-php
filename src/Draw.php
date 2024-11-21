<?php

namespace HiFolks\RandoPhp;

use HiFolks\RandoPhp\Models\Sample;

class Draw
{
    /**
     * @param  array<int|string> $array
     */
    public static function sample($array = []): \HiFolks\RandoPhp\Models\Sample
    {
        return new Sample($array);
    }
}
