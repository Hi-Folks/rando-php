<?php


namespace HiFolks\RandoPhp\Models;


class Integer
{
    private $min = 0;
    private $max= 100;

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

    public function generate() {
        return random_int($this->min, $this->max);
    }

}
