<?php

namespace HiFolks\RandoPhp\Models;

use HiFolks\RandoPhp\Randomize;
use HiFolks\RandoPhp\Draw;

class Sequence
{

    /**
     * @var string
     */
    private $type = "int";
    /**
     * @var int
     */
    private $count = 10;
    /**
     * @var int
     */
    private $min = 0;
    /**
     * @var int
     */
    private $max = 10;
    /**
     * @var bool
     */
    private $unique = false;
    /**
     * @var bool
     */
    private $implode = false;
    /**
     * @var bool
     */
    private $toString = false;
    /**
     * @var int[]
     */
    private $ascii_codes = [];

    /**
     * @return $this
     */
    public function integer()
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
        $this->type = "char";
        $this->ascii_codes = range(97, 122);
        return $this;
    }

    /**
     * Unique means that the sequence includes NO duplicates
     * [1,2,4,7,3] is $unique === true, no duplicates
     * [1,4,3,4,3] is $unique === false, with duplicates
     *
     * @param  bool $unique
     * @return $this
     */
    public function unique($unique = true): self
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
     *
     * @param bool $implode
     */
    public function implode(bool $implode = true): self
    {
        $this->implode = $implode;
        return $this;
    }

    /**
     * @param  int $min
     * @return $this
     */
    public function min(int $min): self
    {
        $this->min = $min;
        return $this;
    }

    /**
     * @param  int $max
     * @return $this
     */
    public function max(int $max): self
    {
        $this->max = $max;
        return $this;
    }

    /**
     * @param  int $count
     * @return $this
     */
    public function count(int $count): self
    {
        $this->count = $count;
        return $this;
    }

    /**
     * @param  string $type
     * @return $this
     */
    public function type(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Set the alpha value to generate
     *
     * @return self
     */
    public function alpha()
    {
        $this->ascii_codes = range(97, 122);
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
    public function alphanumeric()
    {
        $this->ascii_codes = array_merge(range(48, 57), range(97, 122));
        return $this;
    }

    /**
     * Get String
     *
     * @return self
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
    public function generate()
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
                if ($this->unique) {
                    $intArrResult = Draw::sample($this->ascii_codes)->noDuplicates()->count($this->count)->extract();
                    for ($i = 0; $i < sizeof($intArrResult); $i++) {
                        $result[] = chr($intArrResult[$i]);
                    }
                } else {
                    for ($i = 0; $i < $this->count; $i++) {
                        $result[] = Randomize::char()->setAsciiCodes($this->ascii_codes)->generate();
                    }
                }
                break;
        }

        if ($this->implode) {
            return implode(";", $result);
        } elseif ($this->toString) {
            return implode("", $result);
        } else {
            return $result;
        }
    }
}
