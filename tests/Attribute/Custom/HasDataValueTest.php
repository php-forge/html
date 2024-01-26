<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasDataValue;
use PHPUnit\Framework\TestCase;

final class HasDataValueTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasDataValue;
        };

        $this->assertNotSame($instance, $instance->dataValue(''));
    }
}
