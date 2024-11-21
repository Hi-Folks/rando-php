<?php

namespace HiFolks\RandoPhp\Models;

class Integer
{
    public const DEFAULT_MIN = 0;
    public const DEFAULT_MAX = 100;

    /**
     * Integer constructor.
     */
    public function __construct(private int $min = self::DEFAULT_MIN, private int $max = self::DEFAULT_MAX)
    {
    }


    /**
     * Set the greatest value to generate
     *
     * @param  int $max greatest value
     */
    public function max(int $max): self
    {
        $this->max = $max;
        return $this;
    }

    /**
     * Set the smallest value to generate
     *
     * @param  int $min smallest value
     */
    public function min(int $min): self
    {
        $this->min = $min;
        return $this;
    }

    /**
     * Set the range (min and max)
     * Calling range(1,10), it is equivalent of ->min(1)->max(10)
     */
    public function range(int $min, int $max): self
    {
        return $this->min($min)->max($max);
    }

    /**
     * Generate and returns a random integer (considering $min and $max attribute)
     *
     * @return int the random value (integer)
     * @throws \Exception
     */
    public function generate(): int
    {
        return random_int($this->min, $this->max);
    }
}
