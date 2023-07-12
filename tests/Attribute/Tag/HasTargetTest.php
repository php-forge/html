<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Tag;

use InvalidArgumentException;
use PHPForge\Html\Attribute\Tag\HasTarget;
use PHPUnit\Framework\TestCase;

final class HasTargetTest extends TestCase
{
    public function testException(): void
    {
        $instance = new class () {
            use HasTarget;

            protected array $attributes = [];
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'The target attribute value must be one of "_blank", "_self", "_parent", "_top".'
        );

        $instance->target('');
    }

    public function testImmutablity(): void
    {
        $instance = new class () {
            use HasTarget;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->target('_blank'));
    }
}
