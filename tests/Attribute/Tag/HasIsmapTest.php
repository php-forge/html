<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Tag;

use PHPForge\Html\Attribute\Tag\HasIsmap;
use PHPUnit\Framework\TestCase;

final class HasIsmapTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class() {
            use HasIsmap;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->ismap());
    }

    public function testRender(): void
    {
        $instance = new class() {
            use HasIsmap;

            public array $attributes = [];
        };

        $this->assertSame([], $instance->attributes);
        $this->assertSame(['ismap' => true], $instance->ismap()->attributes);
    }
}
