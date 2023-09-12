<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Component;

use PHPForge\Html\Attribute\Component\HasListItem;
use PHPUnit\Framework\TestCase;

final class HasListItemTest extends TestCase
{
    public function testClass(): void
    {
        $instance = new class() {
            use HasListItem;

            public function getListItemClass(): string
            {
                return $this->listItemAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getListItemClass());

        $instance = $instance->listItemClass('foo');

        $this->assertSame('foo', $instance->getListItemClass());

        $instance = $instance->listItemClass('bar');

        $this->assertSame('foo bar', $instance->getListItemClass());
    }

    public function testGetListItemAttributes(): void
    {
        $instance = new class() {
            use HasListItem;
        };

        $this->assertEmpty($instance->getListItemAttributes());

        $instance = $instance->listItemAttributes(['foo' => 'bar']);

        $this->assertSame(['foo' => 'bar'], $instance->getListItemAttributes());
    }

    public function testImmutablity(): void
    {
        $instance = new class() {
            use HasListItem;
        };

        $this->assertNotSame($instance, $instance->listItemAttributes([]));
        $this->assertNotSame($instance, $instance->listItemClass(''));
    }
}
