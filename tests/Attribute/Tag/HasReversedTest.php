<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Tag;

use PHPForge\Html\Attribute\Tag\HasReversed;
use PHPUnit\Framework\TestCase;

final class HasReversedTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasReversed;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->reversed());
    }
}
