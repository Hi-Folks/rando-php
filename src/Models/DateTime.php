<?php

namespace HiFolks\RandoPhp\Models;

class DateTime
{
    /**
     * @var string
     */
    private $format = 'Y-m-d H:i:s';
    /**
     * @var int
     */
    private $min;
    /**
     * @var int
     */
    private $max;

    public function __construct()
    {
        $this->min = self::setMin();
        $this->max = self::setMax();
    }

    /**
     * Set the min day
     * First day (time 00:00:00)
     * @param string $min
     * @return int
     */
    private static function setMin(string $min = 'first day of january this year')
    {
        return strtotime($min);
    }

    /**
     * Set the max day
     * Last day (time 23:59:59)
     * @param string $max
     * @return int
     */
    private static function setMax(string $max = 'last day of december this year')
    {
        return strtotime('tomorrow', strtotime($max)) - 1;
    }

    /**
     * Set the output format
     *
     * @param string $format to use
     * @return self
     */
    public function format(string $format): self
    {
        $this->format = $format;
        return $this;
    }

    /**
     * Set the greatest value to generate
     *
     * @param string $max greatest date
     * @return self
     */
    public function max(string $max): self
    {
        $this->max = self::setMax($max);
        return $this;
    }

    /**
     * Set the smallest value to generate
     *
     * @param  string $min smallest date
     * @return self
     */
    public function min(string $min): self
    {
        $this->min = self::setMin($min);
        return $this;
    }

    /**
     * Set the range (min and max)
     * Calling range('01-05-1989','06-05-1989')
     *
     * @param  string $min
     * @param  string $max
     * @return $this
     */
    public function range(string $min, string $max)
    {
        $this->min = self::setMin($min);
        $this->max = self::setMax($max);
        return $this;
    }

    /**
     * Generate and returns a random string (considering $min and $max attribute)
     *
     * @return string the random value (string)
     * @throws \Exception
     */
    public function generate()
    {
        return gmdate($this->format, rand($this->min, $this->max));
    }
}
