<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Tag;

use PHPForge\Html\Attribute\Tag\HasItemsAttributes;
use PHPUnit\Framework\TestCase;

final class HasItemsAttributesTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasItemsAttributes;
        };

        $this->assertNotSame($instance, $instance->itemsAttributes([]));
    }
}
