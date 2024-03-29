<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Tag;

use InvalidArgumentException;
use PHPForge\Html\Attribute\Tag\HasLoading;
use PHPUnit\Framework\TestCase;

final class HasLoadingTest extends TestCase
{
    public function testEmptyValue(): void
    {
        $instance = new class () {
            use HasLoading;

            protected array $attributes = [];
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The value must not be empty. The valid values are: "eager", "lazy".');

        $instance->loading('');
    }

    public function testInvalidValue(): void
    {
        $instance = new class () {
            use HasLoading;

            protected array $attributes = [];
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'Invalid value "value" for the loading attribute. Allowed values are: "eager", "lazy".'
        );

        $instance->loading('value');
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasLoading;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->loading('eager'));
    }
}
