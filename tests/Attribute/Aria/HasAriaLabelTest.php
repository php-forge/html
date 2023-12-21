<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Aria;

use PHPForge\Html\Attribute\Aria\HasAriaLabel;
use PHPUnit\Framework\TestCase;

final class HasAriaLabelTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasAriaLabel;
        };

        $this->assertNotSame($instance, $instance->ariaLabel(''));
    }
}
