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

        $instance = $instance->itemsClass('test-class');

        $this->assertSame('test-class', $instance->getItemsClass());

        $instance = $instance->itemsClass('test-class-1');

        $this->assertSame('test-class test-class-1', $instance->getItemsClass());

        $instance = $instance->itemsClass('test-override-class', true);

        $this->assertSame('test-override-class', $instance->getItemsClass());
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
