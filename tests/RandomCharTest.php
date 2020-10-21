<?php

namespace HiFolks\RandoPhp\Tests;

use HiFolks\RandoPhp\Randomize;
use PHPUnit\Framework\TestCase;

class RandomCharTest extends TestCase
{
    /** @test */
    public function it_generates_char()
    {
        $char = Randomize::char()->generate();
        $this->assertIsString($char, "Is String");
        $this->assertSame(1, strlen($char), "Is 1 char");
    }

    /** @test */
    public function it_generates_alpha_char()
    {
        $alpha = Randomize::char()->alpha()->generate();
        $this->assertIsString($alpha, "Is String");
        $this->assertSame(1, strlen($alpha), "Is 1 char");
        $this->assertTrue(ctype_alpha($alpha), "Check for alphabetic character");
    }

    /** @test */
    public function it_generates_lowercase_alpha()
    {
        $alpha = Randomize::char()->alpha()->lower()->generate();
        $this->assertIsString($alpha, "Is String");
        $this->assertSame(1, \strlen($alpha), "Is 1 char");
        $this->assertTrue(ctype_alpha($alpha), "Check for alphabetic character");
        $this->assertTrue(ctype_lower($alpha), "Check for lowercase character");
    }

    /** @test */
    public function it_generates_uppercase_alpha()
    {
        $alpha = Randomize::char()->alpha()->upper()->generate();
        $this->assertIsString($alpha, "Is String");
        $this->assertSame(1, \strlen($alpha), "Is 1 char");
        $this->assertTrue(ctype_alpha($alpha), "Check for alphabetic character");
        $this->assertTrue(ctype_upper($alpha), "Check for uppercase character");
    }

    /** @test */
    public function it_generates_numeric_char()
    {
        $alpha = Randomize::char()->numeric()->generate();
        $this->assertIsString($alpha, "Is String");
        $this->assertSame(1, strlen($alpha), "Is 1 char");
        $this->assertTrue(!ctype_alpha($alpha), "Check for not alphabetic character");
    }

    /** @test */
    public function it_generates_alphanumeric_char()
    {
        $alpha = Randomize::char()->alphanumeric()->generate();
        $this->assertIsString($alpha, "Is String");
        $this->assertSame(1, strlen($alpha), "Is 1 char");
        $this->assertTrue(ctype_alnum($alpha), "Check for alphanumeric character");
    }

    /** @test */
    public function it_generates_alphanumeric_lowercase_char()
    {
        $alpha = Randomize::char()->alphanumeric()->lower()->generate();
        $this->assertIsString($alpha, "Is String");
        $this->assertSame(1, strlen($alpha), "Is 1 char");
        $this->assertTrue(ctype_alnum($alpha), "Check for alphanumeric character");
        $this->assertTrue(ctype_alpha($alpha) ? ctype_lower($alpha) : true, "Check for lowercase character");
    }

    /** @test */
    public function it_generates_alphanumeric_uppercase_char()
    {
        $alpha = Randomize::char()->alphanumeric()->upper()->generate();
        $this->assertIsString($alpha, "Is String");
        $this->assertSame(1, strlen($alpha), "Is 1 char");
        $this->assertTrue(ctype_alnum($alpha), "Check for alphanumeric character");
        $this->assertTrue(ctype_alpha($alpha) ? ctype_upper($alpha) : true, "Check for lowercase character");
    }
}
