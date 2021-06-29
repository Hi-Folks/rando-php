<?php

namespace HiFolks\RandoPhp\Tests;

use HiFolks\RandoPhp\Randomize;
use PHPUnit\Framework\TestCase;

class RandomBooleanTest extends TestCase
{
    /** @test */
    public function random_boolean()
    {
        $boolean = Randomize::boolean()->generate();
        $this->assertGreaterThanOrEqual(0, $boolean, "Check min number - boolean");
        $this->assertLessThanOrEqual(1, $boolean, "Check max number - boolean");
        $this->assertIsBool($boolean, "Check is boolean");
    }
}
