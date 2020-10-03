<?php

namespace HiFolks\RandoPhp\Models;

use InvalidArgumentException;
use LogicException;

class FloatModel
{
    private $min = 0;

    private $max = 1;

    private $decimals = 2;

    /**
     * Set the greatest value to generate
     *
     * @param int $max greatest value
     * @return self
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
     * @return self
     */
    public function min(int $min): self
    {
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
        // it's not possible to store more than 20 decimals (or less, depending on the value of significant)
        $this->decimals = min($decimals, 20);
        return $this;
    }

    /**
     * Set the range (min and max)
     * Calling range(1,10), it is equivalent of ->min(1)->max(10)
     *
     * @param  int $min
     * @param  int $max
     * @return self
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
    public function generate(): float
    {
        if ($this->max <= $this->min) {
            throw new LogicException("The specified max is <= than the specified min.");
        }

        $base = (float) random_int($this->min, $this->max - 1);

        if ($this->decimals === 0) {
            return $base;
        }

        for ($i = 1; $i < $this->decimals; $i++) {
            $base += random_int(0, 9) * (10 ** -$i);
        }

        // For the last decimal, there cannot be a zero
        $base += (random_int(1, 9) * (10 ** -$this->decimals));

        // To remove errors from float addition (0.1 + 0.2 = 0.300000000000004 etc)
        return round($base, $this->decimals);
    }
}
