<?php

namespace HiFolks\RandoPhp\Models;

use HiFolks\RandoPhp\Randomize;
use HiFolks\RandoPhp\Draw;

class Sequence
{
    private string $type = "int";
    private int $count = 10;
    private int $min = 0;
    private int $max = 10;
    private bool $unique = false;
    private bool $implode = false;
    private bool $toString = false;



    private ?\HiFolks\RandoPhp\Models\Char $char = null;

    /**
     * @return $this
     */
    public function integer(): static
    {
        $this->type("int");
        return $this;
    }

    /**
     * chars
     * sets the sequence type to char
     *
     * @return $this
     */
    public function chars(): self
    {
        $this->char = new Char();
        $this->type = "char";
        return $this;
    }

    /**
     * Unique means that the sequence includes NO duplicates
     * [1,2,4,7,3] is $unique === true, no duplicates
     * [1,4,3,4,3] is $unique === false, with duplicates
     *
     * @return $this
     */
    public function unique(bool $unique = true): self
    {
        $this->unique = $unique;
        return $this;
    }

    /**
     * @return $this
     */
    public function allowDuplicates(): self
    {
        return $this->unique(false);
    }

    /**
     * @return $this
     */
    public function noDuplicates(): self
    {
        return $this->unique(true);
    }

    /**
     * Set the output. The extract method instead of returning an array,
     * it returns a string with items separated by ","
     */
    public function implode(bool $implode = true): self
    {
        $this->implode = $implode;
        return $this;
    }

    /**
     * @return $this
     */
    public function min(int $min): self
    {
        $this->min = $min;
        return $this;
    }

    /**
     * @return $this
     */
    public function max(int $max): self
    {
        $this->max = $max;
        return $this;
    }

    /**
     * @return $this
     */
    public function count(int $count): self
    {
        $this->count = $count;
        return $this;
    }

    /**
     * @return $this
     */
    public function type(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Set the alpha value to generate
     */
    public function alpha(): static
    {
        $this->char->alpha();
        return $this;
    }

    /**
     * Set the numeric value to generate
     */
    public function numeric(): static
    {
        $this->char->numeric();
        return $this;
    }

    /**
     * Get Alphanumeric value
     */
    public function alphanumeric(): static
    {
        $this->char->alphanumeric();
        return $this;
    }

    /**
     * Get SpecialCharacters value
     */
    public function specialCharacters(): static
    {
        $this->char->specialCharacters();
        return $this;
    }

    /**
     * It sets lower case char set
     * @return $this
     */
    public function alphaLowerCase(): self
    {
        $this->char->alphaLowerCase();
        return $this;
    }

    /**
     * It sets upper case char set
     */
    public function alphaUpperCase(): self
    {
        $this->char->alphaUpperCase();
        return $this;
    }

    /**
     * Get String
     */
    public function asString(bool $toString = true): self
    {
        $this->toString = $toString;
        return $this;
    }


    /**
     * Make the random array.
     *
     * @return int[]|string[]|string
     * @throws \Exception
     */
    public function generate(): string|array
    {
        $result = [];

        switch ($this->type) {
            case "int":
                if ($this->unique) {
                    $arr = range($this->min, $this->max);
                    $result = Draw::sample($arr)->noDuplicates()->count($this->count)->extract();
                } else {
                    for ($i = 0; $i < $this->count; $i++) {
                        $result[] = Randomize::integer()->max($this->max)->min($this->min)->generate();
                    }
                }
                break;

            case "char":
                if ($this->char->hasNoAsciiCodes()) {
                    $this->char->alphaLowerCase();
                }
                if ($this->unique) {
                    $intArrResult =
                        Draw::sample($this->char->getAsciiCodes())
                            ->noDuplicates()
                            ->count($this->count)
                            ->extract();
                    $counter = count($intArrResult);
                    for ($i = 0; $i < $counter; $i++) {
                        $result[] = chr($intArrResult[$i]);
                    }
                } else {
                    for ($i = 0; $i < $this->count; $i++) {
                        $result[] = $this->char->generate();
                    }
                }
                break;
        }
        if ($this->implode) {
            return implode(";", $result);
        }

        if ($this->toString) {
            return implode("", $result);
        }
        return $result;
    }
}
