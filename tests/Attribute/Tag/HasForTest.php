<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Tag;

use PHPForge\Html\Attribute\Tag\HasFor;
use PHPUnit\Framework\TestCase;

final class HasForTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasFor;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->for(''));
    }
}
