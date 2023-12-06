<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Component;

use InvalidArgumentException;
use PHPForge\Html\Attribute\Component\HasList;
use PHPUnit\Framework\TestCase;

final class HasListTest extends TestCase
{
    public function testClass(): void
    {
        $instance = new class () {
            use HasList;

            public function getListClass(): string
            {
                return $this->listAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getListClass());

        $instance = $instance->listClass('foo');

        $this->assertSame('foo', $instance->getListClass());

        $instance = $instance->listClass('bar');

        $this->assertSame('foo bar', $instance->getListClass());
    }

    public function testContainerClass(): void
    {
        $instance = new class () {
            use HasList;

            public function getListContainerClass(): string
            {
                return $this->listContainerAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getListContainerClass());

        $instance = $instance->listContainerClass('foo');

        $this->assertSame('foo', $instance->getListContainerClass());

        $instance = $instance->listContainerClass('bar');

        $this->assertSame('foo bar', $instance->getListContainerClass());
    }

    public function testException(): void
    {
        $instance = new class () {
            use HasList;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid list type "foo".');

        $instance->listType('foo');
    }

    public function testImmutablity(): void
    {
        $instance = new class () {
            use HasList;
        };

        $this->assertNotSame($instance, $instance->listAttributes([]));
        $this->assertNotSame($instance, $instance->listClass(''));
        $this->assertNotSame($instance, $instance->listContainer(true));
        $this->assertNotSame($instance, $instance->listContainerAttributes([]));
        $this->assertNotSame($instance, $instance->listContainerClass(''));
        $this->assertNotSame($instance, $instance->listType(false));
    }
}
