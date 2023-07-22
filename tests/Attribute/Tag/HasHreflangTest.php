<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Tag;

use PHPForge\Html\Attribute\Tag\HasHreflang;
use PHPUnit\Framework\TestCase;

final class HasHreflangTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class() {
            use HasHreflang;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->hreflang(''));
    }
}
