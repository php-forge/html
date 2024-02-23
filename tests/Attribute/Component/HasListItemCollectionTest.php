<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Component;

use PHPForge\Html\Attribute\Component\HasListItemCollection;
use PHPUnit\Framework\TestCase;

final class HasListItemCollectionTest extends TestCase
{
    public function testClass(): void
    {
        $instance = new class () {
            use HasListItemCollection;

            public function getListItemClass(): string
            {
                return $this->listItemAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getListItemClass());

        $instance = $instance->listItemClass('class');

        $this->assertSame('class', $instance->getListItemClass());

        $instance = $instance->listItemClass('class-1');

        $this->assertSame('class class-1', $instance->getListItemClass());

        $instance = $instance->listItemClass('override-class', true);

        $this->assertSame('override-class', $instance->getListItemClass());
    }

    public function testGetListItemAttributes(): void
    {
        $instance = new class () {
            use HasListItemCollection;
        };

        $this->assertEmpty($instance->getListItemAttributes());

        $instance = $instance->listItemAttributes(['class' => 'value']);

        $this->assertSame(['class' => 'value'], $instance->getListItemAttributes());
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasListItemCollection;
        };

        $this->assertNotSame($instance, $instance->listItemAttributes([]));
        $this->assertNotSame($instance, $instance->listItemClass(''));
        $this->assertNotSame($instance, $instance->listItemTag(false));
    }
}
