<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Tag;

use PHPForge\Html\Attribute\Tag\HasItems;
use PHPUnit\Framework\TestCase;

final class HasItemsTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasItems;
        };

        $this->assertNotSame($instance, $instance->items([]));
    }
}
