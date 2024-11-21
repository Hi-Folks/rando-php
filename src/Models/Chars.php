<?php

namespace HiFolks\RandoPhp\Models;

class Chars extends Sequence
{
    /**
     * Chars constructor.
     * @return $this
     */
    public function __construct(int $count = 10)
    {
        $this->chars()->asString()->count($count);
    }
}
