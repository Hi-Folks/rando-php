<?php


namespace HiFolks\RandoPhp\Models;

use HiFolks\RandoPhp\Randomize;
use HiFolks\RandoPhp\Draw;

class Sequence
{

    private $type= "int";
    private $count=10;
    private $min = 0;
    private $max=10;
    private $unique = false;
    private $implode = false;



    public function integer() {

        $this->type("int");
        return $this;
    }

    public function unique($unique = true): self
    {
        $this->unique=$unique;
        return $this;
    }
    /**
     * Set the output. The extract method instead of returning an array,
     * it returns a string with items separated by ","
     * @param bool $implode
     */
    public function implode(bool $implode = true): self
    {
        $this->implode = $implode;
        return $this;
    }
    public function min($min): self
    {
        $this->min = $min;
        return $this;
    }

    public function max($max): self
    {
        $this->max = $max;
        return $this;
    }

    /**
     * @param int $count
     */
    public function count(int $count): self
    {
        $this->count = $count;
        return $this;
    }

    public function type(string $type): self
    {
        $this->type = $type;
        return $this;
    }


    /**
     * Make the random array.
     * @return array
     */
    public  function generate()
    {
        $result = [];

        switch ($this->type)
        {
            case "int":
                if ($this->unique) {
                    $arr = range($this->min, $this->max);

                    $result = Draw::sample($arr)->allowDuplicates(false)->count($this->count)->extract();

                } else {
                    for ($i = 0; $i < $this->count; $i++) {
                        $result[] = Randomize::integer()->max($this->max)->min($this->min)->generate();
                    }
                }
                break;
        }

        if ($this->implode) {
            return implode(";", $result);
        } else {
            return $result;
        }

    }

}
