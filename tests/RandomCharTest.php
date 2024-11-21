<?php

namespace HiFolks\RandoPhp\Tests;

use HiFolks\RandoPhp\Randomize;
use PHPUnit\Framework\TestCase;

class RandomCharTest extends TestCase
{
    /** @test */
    public function it_generates_char(): void
    {
        $char = Randomize::char()->generate();
        $this->assertIsString($char, "Is String");
        $this->assertSame(1, strlen($char), "Is 1 char");
        $this->assertTrue(ctype_alpha($char), "Check for alphabetic character");
        $this->assertTrue(ctype_lower($char), "Check for lowercase character");

        $char = Randomize::char()->alphaLowerCase()->generate();
        $this->assertIsString($char, "Is String");
        $this->assertSame(1, strlen($char), "Is 1 char");
        $this->assertTrue(ctype_alpha($char), "Check for alphabetic character");
        $this->assertTrue(ctype_lower($char), "Check for lowercase character");

        $char = Randomize::char()->alphaUpperCase()->generate();
        $this->assertIsString($char, "Is String");
        $this->assertSame(1, strlen($char), "Is 1 char");
        $this->assertTrue(ctype_alpha($char), "Check for alphabetic character");
        $this->assertTrue(ctype_upper($char), "Check for lowercase character");

        $char = Randomize::char()->alpha()->generate();
        $this->assertIsString($char, "Is String");
        $this->assertSame(1, strlen($char), "Is 1 char");
        $this->assertTrue(ctype_alpha($char), "Check for alphabetic character");

        $char = Randomize::char()->setAsciiCodes([ord('a'), ord('b')])->generate();
        $this->assertIsString($char, "Is String");
        $this->assertSame(1, strlen($char), "Is 1 char");
        $this->assertTrue(ctype_alpha($char), "Check for alphabetic character");
        $this->assertTrue(($char === 'a' || $char === 'b'), "Check for alphabetic character: " .  $char);
    }

    /** @test */
    public function it_generates_alpha_char(): void
    {
        $alpha = Randomize::char()->alpha()->generate();
        $this->assertIsString($alpha, "Is String");
        $this->assertSame(1, strlen($alpha), "Is 1 char");
        $this->assertTrue(ctype_alpha($alpha), "Check for alphabetic character");
    }

    /** @test */
    public function it_generates_lowercase_alpha(): void
    {
        $alpha = Randomize::char()->alpha()->lower()->generate();
        $this->assertIsString($alpha, "Is String");
        $this->assertSame(1, \strlen($alpha), "Is 1 char");
        $this->assertTrue(ctype_alpha($alpha), "Check for alphabetic character");
        $this->assertTrue(ctype_lower($alpha), "Check for lowercase character");
    }

    /** @test */
    public function it_generates_uppercase_alpha(): void
    {
        $alpha = Randomize::char()->alpha()->upper()->generate();
        $this->assertIsString($alpha, "Is String");
        $this->assertSame(1, \strlen($alpha), "Is 1 char");
        $this->assertTrue(ctype_alpha($alpha), "Check for alphabetic character");
        $this->assertTrue(ctype_upper($alpha), "Check for uppercase character");
    }

    /** @test */
    public function it_generates_numeric_char(): void
    {
        $alpha = Randomize::char()->numeric()->generate();
        $this->assertIsString($alpha, "Is String");
        $this->assertSame(1, strlen($alpha), "Is 1 char");
        $this->assertTrue(!ctype_alpha($alpha), "Check for not alphabetic character");
    }

    /** @test */
    public function it_generates_alphanumeric_char(): void
    {
        $alpha = Randomize::char()->alphanumeric()->generate();
        $this->assertIsString($alpha, "Is String");
        $this->assertSame(1, strlen($alpha), "Is 1 char");
        $this->assertTrue(ctype_alnum($alpha), "Check for alphanumeric character");
    }

    /** @test */
    public function it_generates_alphanumeric_lowercase_char(): void
    {
        $alpha = Randomize::char()->alphanumeric()->lower()->generate();
        $this->assertIsString($alpha, "Is String");
        $this->assertSame(1, strlen($alpha), "Is 1 char");
        $this->assertTrue(ctype_alnum($alpha), "Check for alphanumeric character");
        $this->assertTrue(ctype_alpha($alpha) ? ctype_lower($alpha) : true, "Check for lowercase character");
    }

    /** @test */
    public function it_generates_alphanumeric_uppercase_char(): void
    {
        $alpha = Randomize::char()->alphanumeric()->upper()->generate();
        $this->assertIsString($alpha, "Is String");
        $this->assertSame(1, strlen($alpha), "Is 1 char");
        $this->assertTrue(ctype_alnum($alpha), "Check for alphanumeric character");
        $this->assertTrue(ctype_alpha($alpha) ? ctype_upper($alpha) : true, "Check for lowercase character");
    }

    /** @test */
    public function it_generates_customchars(): void
    {
        $array = range(33, 47);
        $obj = Randomize::char()->addArrayCharsInt($array);
        $string = $obj->getAsciiCodesAsString();
        $char = $obj->generate();
        $this->assertIsString($char, "Is String");
        $this->assertSame(1, strlen($char), "Is 1 char");

        $this->assertTrue(in_array(ord($char), $array), "--Check for right char: -" . $char . "-" . $string . "++++++");

        $array = ['a', 'B', 'z'];

        $char = Randomize::char()->addArrayChars($array)->alpha()->generate();
        $this->assertIsString($char, "Is String");
        $this->assertSame(1, strlen($char), "Is 1 char: -" . $char . "-");
    }
}
