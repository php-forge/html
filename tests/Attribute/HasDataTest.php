<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute;

use PHPForge\Html\Attribute\Enum\DataAttributes;
use PHPForge\Html\Attribute\HasData;
use PHPUnit\Framework\TestCase;

final class HasDataTest extends TestCase
{
    public function testExceptionKey(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('The data attribute key and value must be a string.');

        $instance = new class() {
            use HasData;

            protected array $attributes = [];
        };

        $instance->dataAttributes([1 => '']);
    }

    public function testExceptionValue(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('The data attribute key and value must be a string.');

        $instance = new class() {
            use HasData;

            protected array $attributes = [];
        };

        $instance->dataAttributes(['' => 1]);
    }

    public function testImmutability(): void
    {
        $instance = new class() {
            use HasData;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->dataAttributes([DataAttributes::ACTION->value => 'test']));
    }
}
