<?php

namespace HiFolks\RandoPhp\Tests;

use HiFolks\RandoPhp\Randomize;
use PHPUnit\Framework\TestCase;

class RandomCharTest extends TestCase
{
    /** @test */
    public function random_char()
    {
        $char = Randomize::char()->generate();
        $this->assertIsString($char, "Is String");
        $this->assertSame(1, strlen($char), "Is 1 char");

        $alpha = Randomize::char()->alpha()->generate();
        $this->assertIsString($alpha, "Is String");
        $this->assertSame(1, strlen($alpha), "Is 1 char");
        $this->assertTrue(ctype_alpha($alpha), "Check for alphabetic character");

        $alpha = Randomize::char()->numeric()->generate();
        $this->assertIsString($alpha, "Is String");
        $this->assertSame(1, strlen($alpha), "Is 1 char");
        $this->assertTrue(!ctype_alpha($alpha), "Check for not alphabetic character");

        $alpha = Randomize::char()->alphanumeric()->generate();
        $this->assertIsString($alpha, "Is String");
        $this->assertSame(1, strlen($alpha), "Is 1 char");
        $this->assertTrue(ctype_alnum($alpha), "Check for not alphanumeric character");


    }


}
