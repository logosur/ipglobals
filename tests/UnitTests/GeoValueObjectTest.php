<?php

namespace App\Tests\UnitTests;

use PHPUnit\Framework\TestCase;
use App\Domain\ValueObject\Geo;

class GeoValueObject extends TestCase
{
    public function testInvalidValues(): void
    {
        $this->expectException(\Exception::class);
        $geo = new Geo(100.00, 10.00);
    }

    public function testValidValues(): void
    {
        $geo = new Geo(-10.00, 10.00);
        $this->assertTrue(true);
    }
}
