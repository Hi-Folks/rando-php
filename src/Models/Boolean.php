<?php

namespace HiFolks\RandoPhp\Models;

class Boolean
{
    /**
     * @throws \Exception
     */
    public function generate(): bool
    {
        return random_int(0, 1) === 1;
    }
}
