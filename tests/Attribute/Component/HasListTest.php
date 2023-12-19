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

        $instance = $instance->listClass('test-class');

        $this->assertSame('test-class', $instance->getListClass());

        $instance = $instance->listClass('test-class-1');

        $this->assertSame('test-class test-class-1', $instance->getListClass());

        $instance = $instance->listClass('test-override-class', true);

        $this->assertSame('test-override-class', $instance->getListClass());
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

        $instance = $instance->listContainerClass('test-class');

        $this->assertSame('test-class', $instance->getListContainerClass());

        $instance = $instance->listContainerClass('test-class-1');

        $this->assertSame('test-class test-class-1', $instance->getListContainerClass());

        $instance = $instance->listContainerClass('test-override-class', true);

        $this->assertSame('test-override-class', $instance->getListContainerClass());
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

    public function testListType(): void
    {
        $instance = new class () {
            use HasList;

            public function getListType(): string|false
            {
                return $this->listType;
            }
        };

        $this->assertSame('ul', $instance->getListType());

        $instance = $instance->listType('ol');

        $this->assertSame('ol', $instance->getListType());

        $instance = $instance->listType('ul');

        $this->assertSame('ul', $instance->getListType());

        $instance = $instance->listType(false);

        $this->assertFalse($instance->getListType());
    }
}
