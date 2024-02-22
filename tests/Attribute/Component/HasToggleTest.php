<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Component;

use PHPForge\Html\Attribute\Component\HasToggle;
use PHPUnit\Framework\TestCase;

final class HasToggleTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasToggle;
        };

        $this->assertNotSame($instance, $instance->toggle(''));
    }
}
