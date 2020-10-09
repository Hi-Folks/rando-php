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
        $this->min = self::setDefaultMin();
        $this->max = self::setDefaultMax();
    }

    /**
     * Set the default min day
     * First day in this year (time 00:00:00)
     * @return int
     */
    private static function setDefaultMin()
    {
        return strtotime('first day of january this year');
    }

    /**
     * Set the default max day
     * Last day in this year (time 23:59:59)
     * @return int
     */
    private static function setDefaultMax()
    {
        return strtotime('tomorrow', strtotime('last day of december this year')) - 1;
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
        $this->max = strtotime($max);
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
        $this->min = strtotime($min);
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
        $this->min = strtotime($min);
        $this->max = strtotime($max);
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
