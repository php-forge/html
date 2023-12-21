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
            'The target value must be one of the following: _blank, _self, _parent, _top'
        );

        $instance->target('');
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
