<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Component;

use InvalidArgumentException;
use PHPForge\Html\Attribute\Component\HasListItemContainer;
use PHPUnit\Framework\TestCase;

final class HasListItemContainerTest extends TestCase
{
    public function testClass(): void
    {
        $instance = new class () {
            use HasListItemContainer;

            public function getListItemContainerClass(): string
            {
                return $this->listItemContainerAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getListItemContainerClass());

        $instance = $instance->listItemContainerClass('class');

        $this->assertSame('class', $instance->getListItemContainerClass());

        $instance = $instance->listItemContainerClass('class-1');

        $this->assertSame('class class-1', $instance->getListItemContainerClass());

        $instance = $instance->listItemContainerClass('override-class', true);

        $this->assertSame('override-class', $instance->getListItemContainerClass());
    }

    public function testException(): void
    {
        $instance = new class () {
            use HasListItemContainer;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The container tag must be a non-empty string.');

        $instance->listItemContainerTag('');
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasListItemContainer;
        };

        $this->assertNotSame($instance, $instance->listItemContainer(true));
        $this->assertNotSame($instance, $instance->listItemContainerAttributes([]));
        $this->assertNotSame($instance, $instance->listItemContainerClass(''));
        $this->assertNotSame($instance, $instance->listItemContainerTag('span'));
    }
}
