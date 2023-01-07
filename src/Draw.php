<?php

namespace HiFolks\RandoPhp;

use HiFolks\RandoPhp\Models\Sample;

class Draw
{
    /**
     * @param  array<int|string> $array
     * @return Sample
     */
    public static function sample($array = [])
    {
        return new Sample($array);
    }
}
