<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Tag;

use InvalidArgumentException;
use PHPForge\Html\Attribute\Tag\HasCrossorigin;
use PHPUnit\Framework\TestCase;

final class HasCrossoriginTest extends TestCase
{
    public function testException(): void
    {
        $instance = new class {
            use HasCrossorigin;

            protected array $attributes = [];
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Crossorigin must be one of: "anonymous", "use-credentials".');

        $instance->crossorigin('');
    }

    public function testImmutablity(): void
    {
        $instance = new class {
            use HasCrossorigin;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->crossorigin('anonymous'));
    }
}
