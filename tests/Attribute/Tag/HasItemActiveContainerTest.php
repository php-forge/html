<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Tag;

use InvalidArgumentException;
use PHPForge\Html\Attribute\Tag\HasItemActiveContainer;
use PHPUnit\Framework\TestCase;

final class HasItemActiveContainerTest extends TestCase
{
    public function testClass(): void
    {
        $instance = new class () {
            use HasItemActiveContainer;

            protected bool $itemActiveContainer = false;
            protected array $itemActiveContainerAttributes = [];
            protected string $itemActiveContainerTag = 'div';

            public function getItemActiveContainerClass(): string
            {
                return $this->itemActiveContainerAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getItemActiveContainerClass());

        $instance = $instance->itemActiveContainerClass('class');

        $this->assertSame('class', $instance->getItemActiveContainerClass());

        $instance = $instance->itemActiveContainerClass('class-1');

        $this->assertSame('class class-1', $instance->getItemActiveContainerClass());

        $instance = $instance->itemActiveContainerClass('override-class', true);

        $this->assertSame('override-class', $instance->getItemActiveContainerClass());
    }

    public function testException(): void
    {
        $instance = new class () {
            use HasItemActiveContainer;

            protected string $itemActiveContainerTag = '';
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The item container tag must be a non-empty string.');

        $instance->itemActiveContainerTag('');
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasItemActiveContainer;

            protected bool $itemActiveContainer = false;
            protected array $itemActiveContainerAttributes = [];
            protected string $itemActiveContainerTag = 'div';
        };

        $this->assertNotSame($instance, $instance->itemActiveContainer(false));
        $this->assertNotSame($instance, $instance->itemActiveContainerAttributes([]));
        $this->assertNotSame($instance, $instance->itemActiveContainerClass(''));
        $this->assertNotSame($instance, $instance->itemActiveContainerTag('span'));
    }
}
