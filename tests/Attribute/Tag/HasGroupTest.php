<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Tag;

use PHPForge\Html\Attribute\Tag\HasGroup;
use PHPUnit\Framework\TestCase;

final class HasGroupTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasGroup;
        };

        $this->assertNotSame($instance, $instance->groups([]));
    }
}
