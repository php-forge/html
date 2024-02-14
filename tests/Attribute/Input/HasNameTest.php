<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Input;

use PHPForge\Html\Attribute\Input\HasName;
use PHPUnit\Framework\TestCase;

final class HasNameTest extends TestCase
{
    public function testGetName(): void
    {
        $instance = new class () {
            use HasName;

            public array $attributes = [];

            public function getName(): string
            {
                return $this->attributes['name'] ?? '';
            }
        };

        $this->assertEmpty($instance->getName());

        // set name '' to $instance
        $instance = $instance->name('');
        $this->assertSame('', $instance->getName());

        // set name 'value' to $instance
        $instance = $instance->name('value');
        $this->assertSame('value', $instance->getName());
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasName;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->name('value'));
    }
}
