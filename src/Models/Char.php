<?php

namespace HiFolks\RandoPhp\Models;

class Char
{
    private $min = 0;
    private $max = 25;

    /**
     * Set the greatest value to generate
     *
     * @param int $max greatest value
     * @return self
     */
    public function max(int $max)
    {
        $this->max = $max;
        return $this;
    }

    /**
     * Set the smallest value to generate
     *
     * @param int $min smallest value
     * @return self
     */
    public function min(int $min)
    {
        $this->min = $min;
        return $this;
    }

    /**
     * Set the range (min and max)
     * Calling range(1,10), it is equivalent of ->min(1)->max(10)
     *
     * @param int $min
     * @param int $max
     * @return $this
     */
    public function range(int $min, int $max)
    {
        $this->min = $min;
        $this->max = $max;
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
        $ascii_codes = range(48, 57) + range(97, 122);
        $rand_index = random_int($this->min, $this->max);
        return chr($ascii_codes[$rand_index]);
    }
}
