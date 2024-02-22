<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use InvalidArgumentException;
use PHPForge\Html\Attribute\Custom\HasContainerMenuCollection;
use PHPUnit\Framework\TestCase;

final class HasContainerMenuCollectionTest extends TestCase
{
    public function testClass(): void
    {
        $instance = new class () {
            use HasContainerMenuCollection;

            public function getContainerMenuClass(): string
            {
                return $this->containerMenuAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getContainerMenuClass());

        $instance = $instance->containerMenuClass('class');

        $this->assertSame('class', $instance->getContainerMenuClass());

        $instance = $instance->containerMenuClass('class-1');

        $this->assertSame('class class-1', $instance->getContainerMenuClass());

        $instance = $instance->containerMenuClass('override-class', true);

        $this->assertSame('override-class', $instance->getContainerMenuClass());
    }

    public function testException(): void
    {
        $instance = new class () {
            use HasContainerMenuCollection;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The container menu tag must be a non-empty string.');

        $instance->containerMenuTag('');
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasContainerMenuCollection;
        };

        $this->assertNotSame($instance, $instance->containerMenu(true));
        $this->assertNotSame($instance, $instance->containerMenuAttributes([]));
        $this->assertNotSame($instance, $instance->containerMenuClass(''));
        $this->assertNotSame($instance, $instance->containerMenuTag('span'));
    }
}
