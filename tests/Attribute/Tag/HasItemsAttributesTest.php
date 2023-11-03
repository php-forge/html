<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Tag;

use PHPForge\Html\Attribute\Tag\HasItemsAttributes;
use PHPUnit\Framework\TestCase;

final class HasItemsAttributesTest extends TestCase
{
    public function testClass(): void
    {
        $instance = new class () {
            use HasItemsAttributes;

            protected array $attributes = [];

            public function getItemsClass(): string
            {
                return $this->itemsAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getItemsClass());

        $instance = $instance->itemsClass('foo');

        $this->assertSame('foo', $instance->getItemsClass());

        $instance = $instance->itemsClass('bar');

        $this->assertSame('foo bar', $instance->getItemsClass());
    }

    public function testImmutablity(): void
    {
        $instance = new class () {
            use HasItemsAttributes;
        };

        $this->assertNotSame($instance, $instance->itemsAttributes([]));
        $this->assertNotSame($instance, $instance->itemsClass(''));
    }
}
