<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Tag;

use InvalidArgumentException;
use PHPForge\Html\Attribute\Tag\HasWrap;
use PHPUnit\Framework\TestCase;

final class HasWrapTest extends TestCase
{
    public function testException(): void
    {
        $instance = new class() {
            use HasWrap;

            protected array $attributes = [];
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The wrap value must be one of the following: hard, soft');

        $instance->wrap('');
    }

    public function testImmutablity(): void
    {
        $instance = new class() {
            use HasWrap;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->wrap('hard'));
        $this->assertNotSame($instance, $instance->wrap('soft'));
    }
}
