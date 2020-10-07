<?php

namespace HiFolks\RandoPhp\Models;

class Byte
{

    private $length = 8;


    /**
     * @param int $length
     * @return $this
     */
    public function length(int $length): self
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
