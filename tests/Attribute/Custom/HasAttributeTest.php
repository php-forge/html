<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasAttributes;
use PHPUnit\Framework\TestCase;

final class HasAttributeTest extends TestCase
{
    public function testAttribute(): void
    {
        $instance = new class () {
            use HasAttributes;

            public array $attributes = [];
        };

        $instance = $instance->attributes(['class' => 'foo']);
        $instance = $instance->attributes(['disabled' => true]);

        $this->assertSame(['class' => 'foo', 'disabled' => true], $instance->attributes);
    }

    public function testImmutablity(): void
    {
        $instance = new class () {
            use HasAttributes;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->attributes([]));
    }
}
