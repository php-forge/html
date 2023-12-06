<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use InvalidArgumentException;
use PHPForge\Html\Attribute\Custom\HasContainerMenu;
use PHPUnit\Framework\TestCase;

final class HasContainerMenuTest extends TestCase
{
    public function testClass(): void
    {
        $instance = new class () {
            use HasContainerMenu;

            protected bool $containerMenu = true;
            protected string $containerMenuTag = 'div';

            public function getContainerMenuClass(): string
            {
                return $this->containerMenuAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getContainerMenuClass());

        $instance = $instance->containerMenuClass('foo');

        $this->assertSame('foo', $instance->getContainerMenuClass());

        $instance = $instance->containerMenuClass('bar');

        $this->assertSame('foo bar', $instance->getContainerMenuClass());
    }

    public function testException(): void
    {
        $instance = new class () {
            use HasContainerMenu;

            protected bool $containerMenu = true;
            protected string $containerMenuTag = '';
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The container menu tag must be a non-empty string.');

        $instance->containerMenuTag('');
    }

    public function testImmutablity(): void
    {
        $instance = new class () {
            use HasContainerMenu;

            protected string $containerMenuTag = 'div';
        };

        $this->assertNotSame($instance, $instance->containerMenu(true));
        $this->assertNotSame($instance, $instance->containerMenuAttributes([]));
        $this->assertNotSame($instance, $instance->containerMenuClass(''));
        $this->assertNotSame($instance, $instance->containerMenuTag('span'));
    }
}
