<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasIcon;
use PHPUnit\Framework\TestCase;

final class HasIconTest extends TestCase
{
    public function testClass(): void
    {
        $instance = new class() {
            use HasIcon;

            public function getIconAttributes(): array
            {
                return $this->iconAttributes;
            }
        };

        $this->assertEmpty($instance->getIconAttributes());

        $instance = $instance->iconClass('test');

        $this->assertSame(['class' => 'test'], $instance->getIconAttributes());

        $instance = $instance->iconClass('test1');

        $this->assertSame(['class' => 'test test1'], $instance->getIconAttributes());
    }

    public function testContainerClass(): void
    {
        $instance = new class() {
            use HasIcon;

            public function getIconContainerAttributes(): array
            {
                return $this->iconContainerAttributes;
            }
        };

        $this->assertEmpty($instance->getIconContainerAttributes());

        $instance = $instance->iconContainerClass('test');

        $this->assertSame(['class' => 'test'], $instance->getIconContainerAttributes());

        $instance = $instance->iconContainerClass('test1');

        $this->assertSame(['class' => 'test test1'], $instance->getIconContainerAttributes());
    }

    public function testGetIconAttributes(): void
    {
        $instance = new class() {
            use HasIcon;
        };

        $this->assertEmpty($instance->getIconAttributes());

        $instance = $instance->iconAttributes(['class' => 'test']);

        $this->assertSame(['class' => 'test'], $instance->getIconAttributes());
    }

    public function testGetIconContainerAttributes(): void
    {
        $instance = new class() {
            use HasIcon;
        };

        $this->assertEmpty($instance->getIconContainerAttributes());

        $instance = $instance->iconContainerAttributes(['class' => 'test']);

        $this->assertSame(['class' => 'test'], $instance->getIconContainerAttributes());
    }

    public function testGetIconText(): void
    {
        $instance = new class() {
            use HasIcon;
        };

        $this->assertEmpty($instance->getIconText());

        $instance = $instance->iconText('test');

        $this->assertSame('test', $instance->getIconText());
    }

    public function testImmutablity(): void
    {
        $instance = new class() {
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
