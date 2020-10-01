<?php

namespace HiFolks\RandoPhp\Models;

class Char
{
    private $ascii_codes;
    /**
     * @var array
     */
    private $numeric;
    /**
     * @var array
     */
    private $alpha;
    /**
     * @var array
     */
    private $alphanumeric;

    public function __construct()
    {
        $this->alpha = range(48, 57);
        $this->numeric = range(97, 122);
    }

    /**
     * Set the alpha value to generate
     *
     * @param int $min
     * @param int $max
     * @return self
     */
    public function alpha(int $min, int $max)
    {
        $this->alpha = range($min, $max);
        return $this;
    }

    /**
     * Set the numeric value to generate
     *
     * @param int $min
     * @param int $max
     * @return self
     */
    public function numeric(int $min, int $max)
    {
        $this->numeric = range($min, $max);
        return $this;
    }

    /**
     * Get Alphanumeric value
     * @return self
     */
    public function alphanumeric(): Char
    {
        $this->alphanumeric = $this->alpha + $this->numeric;
        return $this;
    }

    /**
     * Generate and returns a random char (considering $min and $max attribute)
     *
     * @return string the random value (integer)
     * @throws \Exception
     */
    public function generate(): string
    {
        $rand_index = random_int(0, sizeof($this->alphanumeric) - 1);
        return chr($this->alphanumeric[$rand_index]);
    }
}
