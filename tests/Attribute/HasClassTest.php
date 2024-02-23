<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute;

use PHPForge\Html\Attribute\HasClass;
use PHPUnit\Framework\TestCase;

final class HasClassTest extends TestCase
{
    public function testClass(): void
    {
        $instance = new class () {
            use HasClass;

            protected array $attributes = [];

            public function getClass(): string
            {
                return $this->attributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getClass());

        $instance = $instance->class('class');

        $this->assertSame('class', $instance->getClass());

        $instance = $instance->class('class-1');

        $this->assertSame('class class-1', $instance->getClass());

        $instance = $instance->class('override-class', true);

        $this->assertSame('override-class', $instance->getClass());
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasClass;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->class(''));
    }
}
