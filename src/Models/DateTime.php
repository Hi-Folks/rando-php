<?php

namespace HiFolks\RandoPhp\Models;

class DateTime
{
    private string $format = 'Y-m-d H:i:s';
    private int|bool $min;
    private int $max;

    public function __construct()
    {
        $this->min = $this->setMin();
        $this->max = $this->setMax();
    }

    /**
     * Set the min day
     * First day (time 00:00:00)
     *
     * @return int
     */
    private function setMin(string $min = 'first day of january this year'): int|false
    {
        return strtotime($min);
    }

    /**
     * Set the max day
     * Last day (time 23:59:59)
     */
    private function setMax(string $max = 'last day of december this year'): int
    {
        return strtotime('tomorrow', strtotime($max)) - 1;
    }

    /**
     * Set the output format
     *
     * @param  string $format to use
     */
    public function format(string $format): self
    {
        $this->format = $format;
        return $this;
    }

    /**
     * Set the greatest value to generate
     *
     * @param  string $max greatest date
     */
    public function max(string $max): self
    {
        $this->max = $this->setMax($max);
        return $this;
    }

    /**
     * Set the smallest value to generate
     *
     * @param  string $min smallest date
     */
    public function min(string $min): self
    {
        $this->min = $this->setMin($min);
        return $this;
    }

    /**
     * Set the range (min and max)
     * Calling range('01-05-1989','06-05-1989')
     *
     * @return $this
     */
    public function range(string $min, string $max): static
    {
        $this->min = $this->setMin($min);
        $this->max = $this->setMax($max);
        return $this;
    }

    /**
     * Generate and returns a random string (considering $min and $max attribute)
     *
     * @return string the random value (string)
     * @throws \Exception
     */
    public function generate(): string
    {
        return gmdate($this->format, random_int($this->min, $this->max));
    }
}
