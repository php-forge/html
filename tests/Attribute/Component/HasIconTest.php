<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Component;

use PHPForge\Html\Attribute\Component\HasIcon;
use PHPUnit\Framework\TestCase;

final class HasIconTest extends TestCase
{
    public function testClass(): void
    {
        $instance = new class () {
            use HasIcon;

            public function getIconClass(): string
            {
                return $this->iconAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getIconClass());

        $instance = $instance->iconClass('test-class');

        $this->assertSame('test-class', $instance->getIconClass());

        $instance = $instance->iconClass('test-class-1');

        $this->assertSame('test-class test-class-1', $instance->getIconClass());

        $instance = $instance->iconClass('test-override-class', true);

        $this->assertSame('test-override-class', $instance->getIconClass());
    }

    public function testContainerClass(): void
    {
        $instance = new class () {
            use HasIcon;

            public function getIconContainerClass(): string
            {
                return $this->iconContainerAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getIconContainerClass());

        $instance = $instance->iconContainerClass('test');

        $this->assertSame('test', $instance->getIconContainerClass());

        $instance = $instance->iconContainerClass('test1');

        $this->assertSame('test test1', $instance->getIconContainerClass());

        $instance = $instance->iconContainerClass('test', true);

        $this->assertSame('test', $instance->getIconContainerClass());
    }

    public function testGetIconAttributes(): void
    {
        $instance = new class () {
            use HasIcon;
        };

        $this->assertEmpty($instance->getIconAttributes());

        $instance = $instance->iconAttributes(['class' => 'test']);

        $this->assertSame(['class' => 'test'], $instance->getIconAttributes());
    }

    public function testGetIconContainerAttributes(): void
    {
        $instance = new class () {
            use HasIcon;
        };

        $this->assertEmpty($instance->getIconContainerAttributes());

        $instance = $instance->iconContainerAttributes(['class' => 'test']);

        $this->assertSame(['class' => 'test'], $instance->getIconContainerAttributes());
    }

    public function testGetIconText(): void
    {
        $instance = new class () {
            use HasIcon;
        };

        $this->assertEmpty($instance->getIconText());

        $instance = $instance->iconText('test');

        $this->assertSame('test', $instance->getIconText());
    }

    public function testImmutablity(): void
    {
        $instance = new class () {
            use HasIcon;
        };

        $this->assertNotSame($instance, $instance->iconAttributes([]));
        $this->assertNotSame($instance, $instance->iconClass(''));
        $this->assertNotSame($instance, $instance->iconContainer(true));
        $this->assertNotSame($instance, $instance->iconContainerAttributes([]));
        $this->assertNotSame($instance, $instance->iconContainerClass(''));
        $this->assertNotSame($instance, $instance->iconText(''));
    }
}
