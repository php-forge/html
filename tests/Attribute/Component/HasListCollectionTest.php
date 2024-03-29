<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Component;

use InvalidArgumentException;
use PHPForge\Html\Attribute\Component\HasListCollection;
use PHPUnit\Framework\TestCase;

final class HasListCollectionTest extends TestCase
{
    public function testClass(): void
    {
        $instance = new class () {
            use HasListCollection;

            public function getListClass(): string
            {
                return $this->listAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getListClass());

        $instance = $instance->listClass('class');

        $this->assertSame('class', $instance->getListClass());

        $instance = $instance->listClass('class-1');

        $this->assertSame('class class-1', $instance->getListClass());

        $instance = $instance->listClass('override-class', true);

        $this->assertSame('override-class', $instance->getListClass());
    }

    public function testContainerClass(): void
    {
        $instance = new class () {
            use HasListCollection;

            public function getListContainerClass(): string
            {
                return $this->listContainerAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getListContainerClass());

        $instance = $instance->listContainerClass('class');

        $this->assertSame('class', $instance->getListContainerClass());

        $instance = $instance->listContainerClass('class-1');

        $this->assertSame('class class-1', $instance->getListContainerClass());

        $instance = $instance->listContainerClass('override-class', true);

        $this->assertSame('override-class', $instance->getListContainerClass());
    }

    public function testListTypeWithEmptyValue(): void
    {
        $instance = new class () {
            use HasListCollection;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The value must not be empty. The valid values are: "ol", "ul".');

        $instance->listType('');
    }

    public function testListTypeWithInvalidValue(): void
    {
        $instance = new class () {
            use HasListCollection;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid value "value" for the list type method. Allowed values are: "ol", "ul".');

        $instance->listType('value');
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasListCollection;
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
            use HasListCollection;

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
