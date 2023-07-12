<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Tag;

use PHPForge\Html\Attribute\Tag\HasGroup;
use PHPUnit\Framework\TestCase;

final class HasGroupTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class {
            use HasGroup;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->groups([]));
    }
}
