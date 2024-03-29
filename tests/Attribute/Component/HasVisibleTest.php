<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Component;

use PHPForge\Html\Attribute\Component\HasVisible;
use PHPUnit\Framework\TestCase;

final class HasVisibleTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasVisible;
        };

        $this->assertNotSame($instance, $instance->visible(false));
    }

    public function testIsVisible(): void
    {
        $instance = new class () {
            use HasVisible;
        };

        $this->assertTrue($instance->isVisible());
        $this->assertFalse($instance->visible(false)->isVisible());
    }
}
