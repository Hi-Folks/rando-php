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

        foreach (range(1, 32) as $len) {
            $byte = Randomize::byte()->length($len)->generate();
            $this->assertSame($len * 2, strlen($byte), "Check length " . $len);
        }
        $catch = false;
        try {
            $byte = Randomize::byte()->length(0)->generate();
        } catch (\Error $e) {
            $catch = true;
            $this->assertIsString($e->getMessage(), "Message Error");
        }
        $this->assertSame(true, $catch, "Exception catch");
    }
}
