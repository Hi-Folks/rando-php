<?php

namespace HiFolks\RandoPhp\Models;

/**
 * Class Char
 * @package HiFolks\RandoPhp\Models
 */
class Char
{
    /**
     * @var int[]
     */
    private $ascii_codes;

    /**
     * Char constructor.
     */
    public function __construct()
    {
        $this->ascii_codes = self::setAlpha();
    }


    /**
     * @return int[]
     */
    private static function setAlpha()
    {
        return range(97, 122);
    }

    /**
     * Set the alpha value to generate
     * @return self
     */
    public function alpha()
    {
        $this->ascii_codes = self::setAlpha();
        return $this;
    }

    /**
     * Set the numeric value to generate
     * @return self
     */
    public function numeric()
    {
        $this->ascii_codes = range(48, 57);
        return $this;
    }

    /**
     * Get Alphanumeric value
     * @return self
     */
    public function alphanumeric(): Char
    {
        $this->ascii_codes = array_merge(range(48, 57) , range(97, 122));
        return $this;
    }

    /**
     * Set Ascii Codes
     * @param int[] $ascii_codes
     * @return Char
     */
    public function setAsciiCodes($ascii_codes): self
    {
        $this->ascii_codes = $ascii_codes;
        return $this;
    }

    /**
     * Generate and returns a random char
     *
     * @return string the random value (integer)
     * @throws \Exception
     */
    public function generate(): string
    {
        $rand_index = random_int(0, sizeof($this->ascii_codes) - 1);
        return chr($this->ascii_codes[$rand_index]);
    }
}
