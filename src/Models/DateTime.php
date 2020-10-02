<?php


namespace HiFolks\RandoPhp\Models;


class DateTime
{
    private $format;
    private $min = 1577811600; // 2020-01-01 00:00:00
    private $max= 1606755600; // 2020-12-01 00:00:00

    public function __construct($format)
    {
        $this->format = $format;
    }

    /** @return self */
    public function max($max) {
        $this->max = $max;
        return $this;
    }

    /** @return self */
    public function min($min) {
        $this->min = $min;
        return $this;
    }

    /**
     * Set the range (min and max)
     * Calling range(1577811600,1606755600)
     * @param $min
     * @param $max
     * @return $this
     */
    public function range($min, $max) {
        $this->min = $min;
        $this->max = $max;
        return $this;
    }

    public function generate() {
        return date($this->format, mt_rand($this->min, $this->max));
    }

}
