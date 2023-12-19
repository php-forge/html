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

        $instance = $instance->class('test-class');

        $this->assertSame('test-class', $instance->getClass());

        $instance = $instance->class('test-class-1');

        $this->assertSame('test-class test-class-1', $instance->getClass());

        $instance = $instance->class('test-override-class', true);

        $this->assertSame('test-override-class', $instance->getClass());
    }

    public function testImmutablity(): void
    {
        $instance = new class () {
            use HasClass;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->class(''));
    }
}
