<?php

namespace HiFolks\RandoPhp\Models;

/**
 * Class Sample
 *
 * @package HiFolks\RandoPhp\Models
 * Useful for draw and extract samples
 * Used in Draw class
 */
class Sample
{
    /**
     * @var array|mixed
     */
    private $array;
    /**
     * @var int
     */
    private $count = 1;
    /**
     * @var bool
     */
    private $unique = true;
    /**
     * @var bool
     */
    private $implode = false;
    /**
     * @var bool
     */
    private $preserveKeys = false;


    /**
     * Sample constructor.
     *
     * @param int[]|string[]|\stdClass[] $array
     */
    public function __construct($array = [])
    {
        $this->array = $array;
    }

    /**
     * Number of items to "extract"
     *
     * @param  int $count
     * @return $this
     */
    public function count($count = 1)
    {
        $this->count = $count;
        return $this;
    }


    /**
     * @return $this
     */
    public function preserveKeys(): self
    {
        $this->preserveKeys = true;
        return $this;
    }

    /**
     * Sets the unique attribute
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
     * Allow extract duplicates from the original array
     *
     * @return $this
     */
    public function allowDuplicates()
    {
        return $this->unique(false);
    }

    /**
     * No duplicates from the original array
     *
     * @return $this
     */
    public function noDuplicates()
    {
        return $this->unique(true);
    }

    /**
     * Extract random keys from array.
     *
     * @return int[]|string[]|int|string|null
     * @throws \Exception
     */
    public function extractKeys()
    {
        $size = count($this->array);
        if ($size >= 1) {
            if (! $this->unique) {
                $keys = array_keys($this->array);
                $result = [];
                for ($i = 0; $i < $this->count; $i++) {
                    $result[] = $keys[random_int(0, count($keys) - 1)];
                }
                return $result;
            } else {
                $a = null;
                try {
                    $a = array_rand($this->array, $this->count);
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
     *
     * @param  bool $implode
     * @return Sample
     */
    public function implode(bool $implode = true): self
    {
        $this->implode = $implode;
        return $this;
    }

    /**
     * Extract and returns a sample random array, from the original array
     *
     * @return int[]|string[]|\stdClass[]|string
     * @throws \Exception
     */
    public function extract()
    {
        $keys = $this->extractKeys();
        $results = [];
        foreach ((array) $keys as $key) {
            if (! $this->unique) {
                $results[] = $this->array[$key];
            } else {
                if ($this->preserveKeys) {
                    $results[$key] = $this->array[$key];
                } else {
                    $results[] = $this->array[$key];
                }
            }
        }
        if ($this->implode) {
            return implode(";", $results);
        } else {
            return $results;
        }
    }
}
