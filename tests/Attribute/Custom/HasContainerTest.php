<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use InvalidArgumentException;
use PHPForge\Html\Attribute\Custom\HasContainer;
use PHPUnit\Framework\TestCase;

final class HasContainerTest extends TestCase
{
    public function testClass(): void
    {
        $instance = new class () {
            use HasContainer;

            public function getContainerClass(): string
            {
                return $this->containerAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getContainerClass());

        $instance = $instance->containerClass('class');

        $this->assertSame('class', $instance->getContainerClass());

        $instance = $instance->containerClass('class-1');

        $this->assertSame('class class-1', $instance->getContainerClass());

        $instance = $instance->containerClass('override-class', true);

        $this->assertSame('override-class', $instance->getContainerClass());
    }

    public function testException(): void
    {
        $instance = new class () {
            use HasContainer;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The container tag must be a non-empty string.');

        $instance->containerTag('');
    }

    public function testContainerGetId(): void
    {
        $instance = new class () {
            use HasContainer;
        };

        $this->assertNull($instance->getContainerId());

        $instance = $instance->containerAttributes(['id' => 'id']);

        $this->assertSame('id', $instance->getContainerId());
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasContainer;

            protected string $containerTag = 'div';
        };

        $this->assertNotSame($instance, $instance->container(true));
        $this->assertNotSame($instance, $instance->containerAttributes([]));
        $this->assertNotSame($instance, $instance->containerClass(''));
        $this->assertNotSame($instance, $instance->containerTag('span'));
        $this->assertNotSame($instance, $instance->containerTemplate(''));
    }
}
