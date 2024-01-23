<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Component;

use PHPForge\Html\Attribute\Component\HasListItem;
use PHPUnit\Framework\TestCase;

final class HasListItemTest extends TestCase
{
    public function testClass(): void
    {
        $instance = new class () {
            use HasListItem;

            public function getListItemClass(): string
            {
                return $this->listItemAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getListItemClass());

        $instance = $instance->listItemClass('test-class');

        $this->assertSame('test-class', $instance->getListItemClass());

        $instance = $instance->listItemClass('test-class-1');

        $this->assertSame('test-class test-class-1', $instance->getListItemClass());

        $instance = $instance->listItemClass('test-override-class', true);

        $this->assertSame('test-override-class', $instance->getListItemClass());
    }

    public function testGetListItemAttributes(): void
    {
        $instance = new class () {
            use HasListItem;
        };

        $this->assertEmpty($instance->getListItemAttributes());

        $instance = $instance->listItemAttributes([
            'foo' => 'bar',
        ]);

        $this->assertSame([
            'foo' => 'bar',
        ], $instance->getListItemAttributes());
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasListItem;
        };

        $this->assertNotSame($instance, $instance->listItemAttributes([]));
        $this->assertNotSame($instance, $instance->listItemClass(''));
        $this->assertNotSame($instance, $instance->listItemTag(false));
    }
}
