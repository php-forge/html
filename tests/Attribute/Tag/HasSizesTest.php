<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Tag;

use PHPForge\Html\Attribute\Tag\HasSizes;
use PHPUnit\Framework\TestCase;

final class HasSizesTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasSizes;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->sizes(''));
    }
}
