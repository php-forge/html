<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasUl;
use PHPUnit\Framework\TestCase;

final class HasUlTest extends TestCase
{
    public function testClass(): void
    {
        $instance = new class() {
            use HasUl;

            public function getUlAttributes(): string
            {
                return $this->ulAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getUlAttributes());

        $instance = $instance->ulClass('foo');

        $this->assertSame('foo', $instance->getUlAttributes());

        $instance = $instance->ulClass('bar');

        $this->assertSame('foo bar', $instance->getUlAttributes());
    }

    public function testContainerClass(): void
    {
        $instance = new class() {
            use HasUl;

            public function getUlContainerAttributes(): string
            {
                return $this->ulContainerAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getUlContainerAttributes());

        $instance = $instance->ulContainerClass('foo');

        $this->assertSame('foo', $instance->getUlContainerAttributes());

        $instance = $instance->ulContainerClass('bar');

        $this->assertSame('foo bar', $instance->getUlContainerAttributes());
    }

    public function testImmutablity(): void
    {
        $instance = new class() {
            use HasUl;
        };

        $this->assertNotSame($instance, $instance->ulAttributes([]));
        $this->assertNotSame($instance, $instance->ulClass(''));
        $this->assertNotSame($instance, $instance->ulContainer(true));
        $this->assertNotSame($instance, $instance->ulContainerAttributes([]));
        $this->assertNotSame($instance, $instance->ulContainerClass(''));
    }
}
