<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Tag;

use PHPForge\Html\Attribute\Tag\HasStart;
use PHPUnit\Framework\TestCase;

final class HasStartTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasStart;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->start(1));
    }
}
