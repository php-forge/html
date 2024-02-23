<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Tag;

use InvalidArgumentException;
use PHPForge\Html\Attribute\Tag\HasCrossorigin;
use PHPUnit\Framework\TestCase;

final class HasCrossoriginTest extends TestCase
{
    public function testEmptyValue(): void
    {
        $instance = new class () {
            use HasCrossorigin;

            public array $attributes = [];
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'The value must not be empty. The valid values are: "anonymous", "use-credentials".'
        );

        $instance->crossorigin('');
    }

    public function testInvalidValue(): void
    {
        $instance = new class () {
            use HasCrossorigin;

            public array $attributes = [];
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'Invalid value "value" for the crossorigin attribute. Allowed values are: "anonymous", "use-credentials".'
        );

        $instance->crossorigin('value');
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasCrossorigin;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->crossorigin('anonymous'));
    }
}
