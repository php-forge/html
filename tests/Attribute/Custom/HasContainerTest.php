<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use InvalidArgumentException;
use PHPForge\Html\Attribute\Custom\HasContainer;
use PHPUnit\Framework\TestCase;

final class HasContainerTest extends TestCase
{
    public function testContainerClass(): void
    {
        $instance = new class {
            use HasContainer;

            protected array $attributes = [];
            protected string $containerTag = 'div';

            public function getContainerClass(): string
            {
                return $this->containerAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getContainerClass());

        $instance = $instance->containerClass('foo');

        $this->assertSame('foo', $instance->getContainerClass());

        $instance = $instance->containerClass('bar');

        $this->assertSame('foo bar', $instance->getContainerClass());
    }

    public function testException(): void
    {
        $instance = new class {
            use HasContainer;

            protected array $attributes = [];
            protected string $containerTag = '';
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The container tag must be a non-empty string.');

        $instance->containerTag('');
    }

    public function testImmutablity(): void
    {
        $instance = new class {
            use HasContainer;

            protected array $attributes = [];
            protected string $containerTag = 'div';
        };

        $this->assertNotSame($instance, $instance->container(true));
        $this->assertNotSame($instance, $instance->containerAttributes([]));
        $this->assertNotSame($instance, $instance->containerClass(''));
        $this->assertNotSame($instance, $instance->containerTag('span'));
    }
}
