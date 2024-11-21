<?php

namespace HiFolks\RandoPhp\Tests;

use HiFolks\RandoPhp\Draw;
use PHPUnit\Framework\TestCase;

class DrawSampleTest extends TestCase
{
    /** @test */
    public function random_extract(): void
    {
        $array = [1,2,3,4,5,6,7,8,9];
        $count = 5;
        $sample = Draw::sample($array)->count($count)->extract();
        $this->assertIsArray($sample);
        $this->assertSame($count, count($sample));
        $sampleKeys = Draw::sample($array)->count($count)->extractKeys();
        $this->assertIsArray($sampleKeys);
        $this->assertSame($count, count($sampleKeys));
    }
    /** @test */
    public function random_extract_duplicates(): void
    {
        $array = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        $count = 5;
        $sample = Draw::sample($array)->allowDuplicates()->count($count)->extract();
        $this->assertIsArray($sample);
        $this->assertSame($count, count($sample));
    }

    /** @test */
    public function random_extract_keys(): void
    {
        $array = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        $count = 5;
        $sampleKeys = Draw::sample($array)->count($count)->extractKeys();
        $this->assertIsArray($sampleKeys, "Check extract key is array");
        $this->assertSame($count, count($sampleKeys), "Check extract count is correct");
    }

    /** @test */
    public function random_extract_keys_with_empty_stuff(): void
    {
        $array = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        $sampleKeys = Draw::sample($array)->count(0)->extractKeys();
        $this->assertSame(null, $sampleKeys, "Null for count 0");
        $this->assertEmpty($sampleKeys, "Check extract key with 0 count");
        $sampleKeys = Draw::sample([])->count(2)->extractKeys();
        $this->assertEmpty($sampleKeys, "Check extract key with empty array");
    }

    /** @test */
    public function random_extract_implode(): void
    {
        $array = [1,2,3,4,5,6,7,8,9];
        $count = 5;
        $sample = Draw::sample($array)->count($count)->implode()->extract();
        $this->assertIsString($sample);
    }

    /** @test */
    public function random_extract_preservekeys(): void
    {
        $array = range(1, 100);
        $count = 5;
        $sample = Draw::sample($array)->count($count)->preserveKeys()->extract();
        $this->assertIsArray($sample);
        $this->assertSame($count, count($sample), "Check extract count is correct");
    }

    /** @test */
    public function random_snap(): void
    {
        $array = ["testa" => "Testa", "croce" => "Croce"];

        $sample = Draw::sample($array)->snap();
        $this->assertIsString($sample, "Element is a string");
        $this->assertContains($sample, ["Testa", "Croce"], "Element is in Array");

        $sample = Draw::sample($array)->snapKey();
        $this->assertIsString($sample, "Element is a string");
        $this->assertContains($sample, ["testa", "croce"], "Element is in Array");

        $array = [
            "first" => ["This", "is", "First"],
            "second" => ["This" , "is", "Second" ]
        ];
        $sample = Draw::sample($array)->snap();
        $this->assertIsArray($sample, "Element is an array");

        $sample = Draw::sample($array)->snapKey();
        $this->assertIsString($sample, "Element is a string");
        $this->assertContains($sample, ["first", "second"], "Element is a valid key");

        $array = [10,11,12,13];
        $sample = Draw::sample($array)->snap();
        $this->assertIsInt($sample, "Element is an Integer");
    }
}
