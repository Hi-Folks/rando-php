<?php

namespace HiFolks\RandoPhp\Models;

class Char
{
    private $ascii_codes;

    public function __construct()
    {

        $this->alpha = range(48, 57);
        $this->numeric = range(97, 122);
    }

    /**
     * Set the alpha value to generate
     * @return self
     */
    public function alpha()
    {
        $this->ascii_codes = range(97, 122);
        return $this;
    }

    /**
     * Set the numeric value to generate
     * @return self
     */
    public function numeric()
    {
        $this->ascii_codes = range(48, 57);
        return $this;
    }

    /**
     * Get Alphanumeric value
     * @return self
     */
    public function alphanumeric(): Char
    {
        $this->ascii_codes = range(48, 57) + range(97, 122);
        return $this;
    }

    /**
     * Generate and returns a random char
     *
     * @return string the random value (integer)
     * @throws \Exception
     */
    public function generate(): string
    {
        $rand_index = random_int(0, sizeof($this->ascii_codes) - 1);
        return chr($this->ascii_codes[$rand_index]);
    }
}
