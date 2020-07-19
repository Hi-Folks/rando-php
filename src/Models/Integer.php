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

    /**
     * Set the range (min and max)
     * Calling range(1,10), it is equivalent of ->min(1)->max(10)
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
        return random_int($this->min, $this->max);
    }

}
