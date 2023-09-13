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
        $instance = new class() {
            use HasListItemContainer;

            protected string $listItemContainerTag = 'div';

            public function getListItemContainerClass(): string
            {
                return $this->listItemContainerAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getListItemContainerClass());

        $instance = $instance->listItemContainerClass('foo');

        $this->assertSame('foo', $instance->getListItemContainerClass());

        $instance = $instance->listItemContainerClass('bar');

        $this->assertSame('foo bar', $instance->getListItemContainerClass());
    }

    public function testException(): void
    {
        $instance = new class() {
            use HasListItemContainer;

            protected string $listItemContainerTag = '';
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The container tag must be a non-empty string.');

        $instance->listItemContainerTag('');
    }

    public function testImmutablity(): void
    {
        $instance = new class() {
            use HasListItemContainer;

            protected string $listContainerTag = 'div';
        };

        $this->assertNotSame($instance, $instance->listItemContainer(true));
        $this->assertNotSame($instance, $instance->listItemContainerAttributes([]));
        $this->assertNotSame($instance, $instance->listItemContainerClass(''));
        $this->assertNotSame($instance, $instance->listItemContainerTag('span'));
    }
}
