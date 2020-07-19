<?php

namespace HiFolks\RandoPhp\Tests;

use HiFolks\RandoPhp\Randomize;
use PHPUnit\Framework\TestCase;

class RandomByteTest extends TestCase
{
    /** @test */
    public function random_byte()
    {
        $byte = Randomize::byte()->generate();
        $this->assertIsString($byte, "Is String");

        foreach (range(1,32) as $len) {
            $byte = Randomize::byte()->length($len)->generate();
            $this->assertEquals($len*2, strlen($byte), "Check length ". $len);
        }
        $catch = false;
        try {
            $byte = Randomize::byte()->length(0)->generate();
        } catch (\Error $e) {
            $catch = true;
            $this->assertStringContainsString("Length must be greater", $e->getMessage(), "Message Error test");
        }
        $this->assertEquals(true, $catch, "Exception catch");


    }


}
