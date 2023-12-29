<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Component;

use PHPForge\Html\Attribute\Component\HasToggleButton;
use PHPUnit\Framework\TestCase;

final class HasToggleButtonTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasToggleButton;
        };

        $this->assertNotSame($instance, $instance->toggleButton(''));
    }
}
