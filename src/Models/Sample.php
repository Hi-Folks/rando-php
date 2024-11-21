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
    private int $count = 1;
    private bool $unique = true;
    private bool $implode = false;
    private bool $preserveKeys = false;


    /**
     * Sample constructor.
     *
     * @param int[]|string[]|\stdClass[] $array
     */
    public function __construct(private $array = [])
    {
    }

    /**
     * Number of items to "extract"
     *
     * @return $this
     */
    public function count(int $count = 1): static
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
     * @return $this
     */
    public function unique(bool $unique = true): self
    {
        $this->unique = $unique;
        return $this;
    }

    /**
     * Allow extract duplicates from the original array
     */
    public function allowDuplicates(): \HiFolks\RandoPhp\Models\Sample
    {
        return $this->unique(false);
    }

    /**
     * No duplicates from the original array
     */
    public function noDuplicates(): \HiFolks\RandoPhp\Models\Sample
    {
        return $this->unique(true);
    }

    /**
     * Extract random keys from array.
     *
     * @return int[]|string[]|int|string|null
     */
    public function extractKeys(): array|null|int|string
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
            }
            $a = null;
            try {
                $a = array_rand($this->array, $this->count);
                if (is_array($a)) {
                    shuffle($a);
                }
            } catch (\Exception | \Error) {
                return null;
            }
            return $a;
        }
        return null;
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
     * Return just 1 element (value) from array
     * @return int|mixed|\stdClass|string
     */
    public function snap()
    {
        $key =  $this->count(1)->preserveKeys()->extractKeys();
        return $this->array[$key];
    }

    /**
     * Return just 1 element (the key) from array
     * @return int|int[]|string|string[]|null
     */
    public function snapKey(): int|string|array|null
    {
        return $this->count(1)->preserveKeys()->extractKeys();
    }


    /**
     * Extract and returns a sample random array, from the original array
     *
     * @return int[]|string[]|\stdClass[]|string
     * @throws \Exception
     */
    public function extract(): string|array
    {
        $keys = $this->extractKeys();
        $results = [];
        foreach ((array) $keys as $key) {
            if (! $this->unique) {
                $results[] = $this->array[$key];
            } elseif ($this->preserveKeys) {
                $results[$key] = $this->array[$key];
            } else {
                $results[] = $this->array[$key];
            }
        }
        if ($this->implode) {
            // @TODO implode only for scalar type items
            /** @phpstan-ignore-next-line */
            return implode(";", $results);
        }
        return $results;
    }
}
