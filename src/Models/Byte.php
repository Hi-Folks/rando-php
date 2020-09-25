<?php

namespace HiFolks\RandoPhp\Models;

class Byte
{

    private $length = 8;


    public function length($length): self
    {
        $this->length = $length;
        return $this;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function generate(): string
    {
        return bin2hex(random_bytes($this->length));
    }
}
