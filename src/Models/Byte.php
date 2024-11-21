<?php

namespace HiFolks\RandoPhp\Models;

class Byte
{
    private int $length = 8;


    /**
     * @return $this
     */
    public function length(int $length): self
    {
        $this->length = $length;
        return $this;
    }

    /**
     * @throws \Exception
     */
    public function generate(): string
    {
        return bin2hex(random_bytes($this->length));
    }
}
