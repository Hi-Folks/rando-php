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
     * @var int[]
     */
    private $presetAlphaLower;
    /**
     * @var int[]
     */
    private $presetAlphaUpper;
    /**
     * @var int[]
     */
    private $presetNumeric;




    /**
     * List of Transformers to apply when generate() is called
     * to add some transformers use transformers chainable methods like
     * ->lower() or ->upper()
     *
     * @var string[]
     */
    private $transformersStack = [];


    /**
     * List of Transformers available (with the related method to call)
     * @var string[]
     */
    private $transformers = [
        'lower' => 'transformLower',
        'upper' => 'transformUpper'
    ];



    /**
     * Char constructor.
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Reset all attributes to default values. It is useful for the construct method
     * but also when you want to reinitialize Char object.
     */
    public function reset()
    {
        $this->ascii_codes = [];
        $this->transformersStack = [];
        $this->presetAlphaLower = range(97, 122);
        $this->presetAlphaUpper = range(65, 90);
        $this->presetNumeric = range(48, 57);
    }


    /**
     * Add an array of chars (ordinal/numerical ascii value) to the array for randomly select char
     *
     * @param array $preset
     */
    public function addPreset(array $preset)
    {
        $this->ascii_codes = $this->ascii_codes + $preset;
        return $this;
    }

    public function getAsciiCodes()
    {
        return $this->ascii_codes;
    }
    public function getAsciiCodesAsString()
    {
        return implode(",", $this->ascii_codes);
    }


    /**
     * @param int[] $charset
     * @return $this
     */
    public function addArrayCharsInt(array $charset)
    {

        return $this->addPreset($charset);
    }
    /**
     * @param array $charset
     * @return $this
     */
    public function addArrayChars(array $charset)
    {
        $preset = [];
        foreach ($charset as $c) {
            $preset[] = ord($c);
        }

        return $this->addPreset($preset);
    }
    /**
     * Add a transformer type.
     * A Transformer is a method used in generate method to modify the char set.
     * For example if you want to have only lower case
     * (it applies strtolower to the charset) before to select randomly 1
     *
     * @param string $transformType
     */
    private function addTransform(string $transformType)
    {
        if (array_key_exists($transformType, $this->transformers)) {
            $this->transformersStack = $this->transformersStack + [$transformType];
        }
    }



    /**
     * Set the alpha value to generate. 'A'-'Z' and 'a'-'z' (upper and lower case)
     * @return self
     */
    public function alpha()
    {
        $this->addPreset($this->presetAlphaLower);
        $this->addPreset($this->presetAlphaUpper);
        return $this;
    }

    /**
     * Set active transformer to lowercase
     *
     * @return self
     */
    public function lower()
    {
        $this->addTransform("lower");
        return $this;
    }

    /**
     * Set active transformer to uppercase
     *
     * @return self
     */
    public function upper()
    {
        $this->addTransform('upper');
        return $this;
    }

    /**
     * Set the numeric value to generate ('0'-'9')
     *
     * @return self
     */
    public function numeric()
    {
        $this->addPreset($this->presetNumeric);
        return $this;
    }

    /**
     * Get Alphanumeric value. 'A'-'Z' AND 'a'-'z' AND '0'-'9'
     *
     * @return self
     */
    public function alphanumeric(): Char
    {
        $this->addPreset($this->presetAlphaLower);
        $this->addPreset($this->presetAlphaUpper);
        $this->addPreset($this->presetNumeric);
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
     * @return $this
     */
    private function transformLower(): self
    {
        $t = [];
        foreach ($this->ascii_codes as $a) {
            $t[] = ord(strtolower(chr($a)));
        }
        $this->ascii_codes = array_unique($t, SORT_NUMERIC);
        sort($this->ascii_codes);
        return $this;
    }
    /**
     * @return $this
     */
    private function transformUpper(): self
    {
        $t = [];
        foreach ($this->ascii_codes as $a) {
            $t[] = ord(strtoupper(chr($a)));
        }
        $this->ascii_codes = array_unique($t, SORT_NUMERIC);
        sort($this->ascii_codes);
        //$this->ascii_codes = array_diff( $this->ascii_codes , $this->presetAlphaUpper);
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

        if (sizeof($this->ascii_codes) === 0) {
            $this->addPreset($this->presetAlphaLower);
            $this->addPreset($this->presetAlphaUpper);
        }
        foreach ($this->transformersStack as $transformerCode) {
            call_user_func(array($this , $this->transformers[$transformerCode]));
        }

        $rand_index = random_int(0, sizeof($this->ascii_codes) - 1);

        $returnValue = chr($this->ascii_codes[$rand_index]);
        $this->reset();
        return $returnValue;
    }
}
