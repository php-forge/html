<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Input;

use PHPForge\Html\Attribute\Input\HasValue;
use PHPUnit\Framework\TestCase;

final class HasValueTest extends TestCase
{
    public function testGetValue(): void
    {
        $instance = new class () {
            use HasValue;

            protected array $attributes = [
                'value' => 'foo',
            ];
        };

        $this->assertSame('foo', $instance->getValue());
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasValue;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->value(null));
    }
}
