<?php

namespace HiFolks\RandoPhp\Models;

use HiFolks\RandoPhp\Draw;

/**
 * Class Char
 *
 * @package HiFolks\RandoPhp\Models
 */
class Char
{
    /**
     * @var int[]
     */
    private $ascii_codes;

    /**
     * Callback list
     *
     * @var string[]
     */
    private $transformers = [
        'lower' => 'strtolower',
        'upper' => 'strtoupper'
    ];

    /**
     * Current active case
     *
     * @var string
     */
    private $case;

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
     *
     * @return self
     */
    public function alpha()
    {
        $this->ascii_codes = self::setAlpha();
        return $this;
    }

    /**
     * Set active transformer to lowercase
     *
     * @return self
     */
    public function lower()
    {
        $this->case = 'lower';
        return $this;
    }

    /**
     * Set active transformer to uppercase
     *
     * @return self
     */
    public function upper()
    {
        $this->case = 'upper';
        return $this;
    }

    /**
     * Set the numeric value to generate
     *
     * @return self
     */
    public function numeric()
    {
        $this->ascii_codes = range(48, 57);
        return $this;
    }

    /**
     * Get Alphanumeric value
     *
     * @return self
     */
    public function alphanumeric(): Char
    {
        $this->ascii_codes = array_merge(range(48, 57), range(97, 122));
        return $this;
    }

    /**
     * Set Ascii Codes
     *
     * @param  int[] $ascii_codes
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

        $randomChar = chr($this->ascii_codes[$rand_index]);

        // If user called either lower() or upper(), apply active trasformer callback to random char
        if (isset($this->case)) {
            return call_user_func($this->transformers[$this->case], $randomChar);
        }

        // Else return random char with random case
        $randomCaseCallback = Draw::sample($this->transformers)->extract()[0];
        return call_user_func($randomCaseCallback, $randomChar);
    }
}
