<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Tag;

use InvalidArgumentException;
use PHPForge\Html\Attribute\Tag\HasTarget;
use PHPUnit\Framework\TestCase;

final class HasTargetTest extends TestCase
{
    public function testEmptyValue(): void
    {
        $instance = new class () {
            use HasTarget;

            protected array $attributes = [];
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'The value must not be empty. The valid values are: "_blank", "_self", "_parent", "_top".'
        );

        $instance->target('');
    }

    public function testInvalidValue(): void
    {
        $instance = new class () {
            use HasTarget;

            protected array $attributes = [];
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'Invalid value "value" for the target attribute. Allowed values are: "_blank", "_self", "_parent", "_top".'
        );

        $instance->target('value');
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasTarget;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->target('_blank'));
    }
}
