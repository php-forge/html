<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasAttributes;
use PHPUnit\Framework\TestCase;

final class HasAttributesTest extends TestCase
{
    public function testAttributes(): void
    {
        $instance = new class () {
            use HasAttributes;

            public array $attributes = [];
        };

        $instance = $instance->attributes(['class' => 'value']);
        $instance = $instance->attributes(['disabled' => true]);

        $this->assertSame(['class' => 'value', 'disabled' => true], $instance->attributes);
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasAttributes;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->attributes([]));
    }
}
