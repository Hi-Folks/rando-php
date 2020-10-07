<?php

namespace HiFolks\RandoPhp\Models;

use InvalidArgumentException;
use LogicException;

class FloatModel
{
    private $min = 0.0;

    private $max = 1.0;

    private $decimals = 2;

    /**
     * Set the greatest value to generate
     *
     * @param  int|float $max greatest value
     * @throws InvalidArgumentException
     * @return self
     */
    public function max($max): self
    {
        if (!is_float($max) && !is_int($max)) {
            throw new InvalidArgumentException("The max argument must be either an integer or a float.");
        }

        $this->max = $max;
        return $this;
    }

    /**
     * Set the smallest value to generate
     *
     * @param  int|float $min smallest value
     * @throws InvalidArgumentException
     * @return self
     */
    public function min($min): self
    {
        if (!is_float($min) && !is_int($min)) {
            throw new InvalidArgumentException("The min argument must be either an integer or a float.");
        }

        $this->min = $min;
        return $this;
    }

    /**
     * Sets the number of decimals (precision)
     *
     * @param int $decimals number of decimals (precision)
     * @return self
     */
    public function decimals(int $decimals): self
    {
        if ($decimals < 0) {
            throw new InvalidArgumentException("The number of decimals cannot be negative.");
        }

        // Due to the way PHP floating point numbers are implemented (IEEE 754)
        // A guaranteed number of decimal places is around 5, but in 99% of the cases is 8
        $this->decimals = min($decimals, 8);
        return $this;
    }

    /**
     * Set the range (min and max)
     * Calling range(1,10), it is equivalent of ->min(1)->max(10)
     *
     * @param  int|float $min
     * @param  int|float $max
     * @return self
     */
    public function range($min, $max): self
    {
        return $this->min($min)->max($max);
    }

    /**
     * Generate and returns a random integer (considering $min and $max attribute)
     *
     * @return float the float random value
     * @throws \Exception
     */
    public function generate(): float
    {
        if ($this->max <= $this->min) {
            throw new LogicException("The specified max is <= than the specified min.");
        }

        $base = $this->min + mt_rand() / mt_getrandmax() * ($this->max - $this->min);

        return round($base, $this->decimals);
    }
}
