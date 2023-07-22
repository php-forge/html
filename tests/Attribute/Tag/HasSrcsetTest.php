<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Tag;

use PHPForge\Html\Attribute\Tag\HasSrcset;
use PHPUnit\Framework\TestCase;

final class HasSrcsetTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class() {
            use HasSrcset;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->srcset(''));
    }
}
