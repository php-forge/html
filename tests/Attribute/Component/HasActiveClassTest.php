<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Component;

use PHPForge\Html\Attribute\Component\HasActiveClass;
use PHPUnit\Framework\TestCase;

final class HasActiveClassTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasActiveClass;
        };

        $this->assertNotSame($instance, $instance->activeClass('', true));
    }

    public function testOverride(): void
    {
        $instance = new class () {
            use HasActiveClass;

            public function getActiveClass(): string
            {
                return $this->activeClass;
            }

            public function getOverride(): bool
            {
                return $this->override;
            }
        };

        $instance = $instance->activeClass('active');

        $this->assertSame('active', $instance->getActiveClass());
        $this->assertFalse($instance->getOverride());

        $instance = $instance->activeClass('active', true);

        $this->assertSame('active', $instance->getActiveClass());
        $this->assertTrue($instance->getOverride());
    }
}
