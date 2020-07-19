<?php


namespace HiFolks\RandoPhp\Tests;


use HiFolks\RandoPhp\Draw;
use PHPUnit\Framework\TestCase;

class DrawSampleTest extends TestCase
{
    /** @test */
    public function random_extract()
    {
        $array=[1,2,3,4,5,6,7,8,9];
        $count=5;
        $sample = Draw::sample($array)->count($count)->extract();
        $this->assertIsArray($sample);
        $this->assertEquals($count, count($sample));
        $sampleKeys = Draw::sample($array)->count($count)->extractKeys();
        $this->assertIsArray($sampleKeys);
        $this->assertEquals($count, count($sampleKeys));
    }
    /** @test */
    public function random_extract_duplicates()
    {
        $array = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        $count = 5;
        $sample = Draw::sample($array)->allowDuplicates()->count($count)->extract();
        $this->assertIsArray($sample);
        $this->assertEquals($count, count($sample));
    }

    /** @test */
    public function random_extract_keys()
    {
        $array = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        $count = 5;
        $sampleKeys = Draw::sample($array)->count($count)->extractKeys();
        $this->assertIsArray($sampleKeys, "Check extract key is array");
        $this->assertEquals($count, count($sampleKeys), "Check extract count is correct");
    }

    /** @test */
    public function random_extract_keys_with_empty_stuff()
    {
        $array = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        $count = 5;
        $sampleKeys = Draw::sample($array)->count(0)->extractKeys();
        $this->assertEmpty($sampleKeys, "Check extract key with 0 count");
        $sampleKeys = Draw::sample([])->count(2)->extractKeys();
        $this->assertEmpty($sampleKeys, "Check extract key with empty array");
    }

    /** @test */
    public function random_extract_implode()
    {
        $array=[1,2,3,4,5,6,7,8,9];
        $count=5;
        $sample = Draw::sample($array)->count($count)->implode()->extract();
        $this->assertIsString($sample);

    }

}
