<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Aria;

use PHPForge\Html\Attribute\Aria\HasAriaControls;
use PHPUnit\Framework\TestCase;

final class HasAriaControlsTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasAriaControls;
        };

        $this->assertNotSame($instance, $instance->ariaControls(''));
    }
}
