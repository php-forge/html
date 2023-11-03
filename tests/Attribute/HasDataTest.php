<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute;

use PHPForge\Html\Attribute\Enum\DataAttributes;
use PHPForge\Html\Attribute\HasData;
use PHPUnit\Framework\TestCase;

final class HasDataTest extends TestCase
{
    public function testClosure(): void
    {
        $instance = new class () {
            use HasData;

            protected array $attributes = [];

            public function getAttributes(): array
            {
                return $this->attributes;
            }
        };

        $closure = fn () => 'test-action';
        $instance = $instance->dataAttributes([DataAttributes::DATA_ACTION => $closure]);

        $this->assertSame(['data-action' => $closure], $instance->getAttributes());
    }

    public function testExceptionKey(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'The data attribute key must be a string and the value must be a string or a Closure.',
        );

        $instance = new class () {
            use HasData;

            protected array $attributes = [];
        };

        $instance->dataAttributes([1 => '']);
    }

    public function testExceptionValue(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'The data attribute key must be a string and the value must be a string or a Closure.',
        );

        $instance = new class () {
            use HasData;

            protected array $attributes = [];
        };

        $instance->dataAttributes(['' => 1]);
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasData;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->dataAttributes([DataAttributes::DATA_ACTION => 'test-action']));
    }
}
