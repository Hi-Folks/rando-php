<?php


namespace HiFolks\RandoPhp\Models;


/**
 * Class Sample
 * @package HiFolks\RandoPhp\Models
 * Useful for draw and extract samples
 * Used in Draw class
 */
class Sample
{
    private $array=[];
    private $count = 1;
    private $allowDuplicates = false;
    private $implode = false;



    public function __construct($array = [])
    {
        $this->array = $array;
    }

    /**
     * Number of items to "extract"
     * @param int $count
     * @return $this
     */
    public function count( $count = 1) {
        $this->count = $count;
        return $this;
    }

    /**
     * Allow extract duplicates from the original array
     * @param bool $allow
     * @return $this
     */
    public function allowDuplicates( $allow = true) {
        $this->allowDuplicates = $allow;
        return $this;
    }

    /**
     * Extract random keys from array.
     *
     * @return array|int|string|null
     * @throws \Exception
     */
    public function extractKeys() {
        $size = count($this->array);
        if ($size >=1) {
            if ($this->allowDuplicates) {
                $keys= array_keys($this->array);
                $result = [];
                for ($i =0; $i<$this->count; $i++) {
                    $result[] = $keys[random_int(0, count($keys)-1)];
                }
                return $result;
            } else {
                $a = null;
                try {
                    $a = array_rand( $this->array, $this->count  );
                    if (is_array($a)) {
                        shuffle($a);
                    }
                } catch (\Exception $e) {
                }
                return $a;
            }
        } else {
            return null;
        }
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

    /**
     * Extract and returns a sample random array, from the original array
     * @return array|string
     * @throws \Exception
     */
    public function extract() {
        $keys = $this->extractKeys();
        $results = [];
        foreach ((array) $keys as $key) {
            if ($this->allowDuplicates) {
                $results[] = $this->array[$key];
            } else {
                $results[$key] = $this->array[$key];
            }
        }
        if ($this->implode) {
            return implode(";",$results);
        } else {
            return $results;
        }
    }

}
