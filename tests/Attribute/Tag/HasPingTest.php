<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Tag;

use PHPForge\Html\Attribute\Tag\HasPing;
use PHPUnit\Framework\TestCase;

final class HasPingTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class {
            use HasPing;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->ping(''));
    }
}
