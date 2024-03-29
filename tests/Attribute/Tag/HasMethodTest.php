<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Tag;

use PHPForge\Html\Attribute\Tag\HasMethod;
use PHPUnit\Framework\TestCase;

final class HasMethodTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasMethod;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->method(''));
    }

    public function testRender(): void
    {
        $instance = new class () {
            use HasMethod;

            public array $attributes = [];

            public function getMethod(): string
            {
                return $this->attributes['method'] ?? '';
            }
        };

        $this->assertEmpty($instance->getMethod());
        $this->assertSame('GET', $instance->method('get')->getMethod());
    }
}
