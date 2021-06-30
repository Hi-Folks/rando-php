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
     * @var int[]
     * (32–47 / 58–64 / 91–96 / 123–126): Special characters include all printable characters that
     * are neither letters nor numbers. These include punctuation or technical, mathematical characters.
     * ASCII also includes the space (a non-visible but printable character), and, therefore,
     * does not belong to the control characters category, as one might suspect.
     */
    private $presetSpecialCharacters;




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
     * @return void
     */
    public function reset()
    {
        $this->ascii_codes = [];
        $this->transformersStack = [];
        $this->presetAlphaLower = range(97, 122);
        $this->presetAlphaUpper = range(65, 90);
        $this->presetNumeric = range(48, 57);

        $this->presetSpecialCharacters =
            array_merge(
                range(32, 47),
                range(58, 64),
                range(91, 96),
                range(123, 126)
            );
    }


    /**
     * Add an array of chars (ordinal/numerical ascii value) to the array for randomly select char
     *
     * @param int[] $preset
     * @return self
     */
    public function addPreset(array $preset)
    {
        foreach ($preset as $p) {
            array_push($this->ascii_codes, $p);
        }
        return $this;
    }

    /**
     * It returns the chars set, used for the random generation.
     * The chars are in "ordinal" form, so int that represents the char
     * according with Ascii Table
     * @return int[]
     */
    public function getAsciiCodes()
    {
        return $this->ascii_codes;
    }

    /**
     * @return string
     */
    public function getAsciiCodesAsString()
    {
        return implode(",", $this->ascii_codes);
    }


    /**
     * @param int[] $charset
     * @return self
     */
    public function addArrayCharsInt(array $charset)
    {
        return $this->addPreset($charset);
    }
    /**
     * @param string[] $charset
     * @return self
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
     * @return void
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
     * Set the alpha value to generate. 'a'-'z' (lower case)
     * @return self
     */
    public function alphaLowerCase()
    {
        $this->addPreset($this->presetAlphaLower);
        return $this;
    }
    /**
     * Set the alpha value to generate. 'A'-'Z' (upper case)
     * @return self
     */
    public function alphaUpperCase()
    {
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
     * Set the special characters
     *
     * @return self
     */
    public function specialCharacters()
    {
        $this->addPreset($this->presetSpecialCharacters);
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
     * return true if no ascii codes is set
     * @return bool
     */
    public function hasNoAsciiCodes(): bool
    {
        return ( sizeof($this->ascii_codes) === 0);
    }

    /**
     * @param int[] $array
     */
    public function cleanAsciiCodes(array $array): void
    {
        $this->ascii_codes = array_unique($array, SORT_NUMERIC);
        sort($this->ascii_codes);
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
        $this->cleanAsciiCodes($t);
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
        $this->cleanAsciiCodes($t);
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
            /*
             * The DEFAULT IS: if no set (alpha , numeric etc) is defined
             * it will be considered only alphabetical char in lower case
             * 'a-z'
             */
            $this->addPreset($this->presetAlphaLower);
        }
        foreach ($this->transformersStack as $transformerCode) {
            call_user_func(array($this , $this->transformers[$transformerCode]));
        }

        $rand_index = random_int(0, sizeof($this->ascii_codes) - 1);

        $returnValue = chr($this->ascii_codes[$rand_index]);
        // we don't need to reset because once the object is instanced, you can call
        // multiple time
        // $this->reset();
        return $returnValue;
    }
}
