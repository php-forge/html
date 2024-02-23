<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Tag;

use InvalidArgumentException;
use PHPForge\Html\Attribute\Tag\HasWrap;
use PHPUnit\Framework\TestCase;

final class HasWrapTest extends TestCase
{
    public function testEmptyValue(): void
    {
        $instance = new class () {
            use HasWrap;

            protected array $attributes = [];
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The value must not be empty. The valid values are: "hard", "soft".');

        $instance->wrap('');
    }

    public function testInvalidValue(): void
    {
        $instance = new class () {
            use HasWrap;

            protected array $attributes = [];
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid value "value" for the wrap attribute. Allowed values are: "hard", "soft".');

        $instance->wrap('value');
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasWrap;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->wrap('hard'));
        $this->assertNotSame($instance, $instance->wrap('soft'));
    }
}
