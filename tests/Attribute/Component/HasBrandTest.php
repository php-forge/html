<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Component;

use PHPForge\Html\Attribute\Component\HasBrand;
use PHPUnit\Framework\TestCase;

final class HasBrandTest extends TestCase
{
    public function testBrandContainerClass(): void
    {
        $instance = new class () {
            use HasBrand;

            public function getBrandContainerClass(): string
            {
                return $this->brandContainerAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->brandContainerClass('')->getBrandContainerClass());

        $instance = $instance->brandContainerClass('test-class');
        $this->assertSame('test-class', $instance->getBrandContainerClass());

        $instance = $instance->brandContainerClass('test-class-1');

        $this->assertSame('test-class test-class-1', $instance->getBrandContainerClass());

        $instance = $instance->brandContainerClass('test-override-class', true);

        $this->assertSame('test-override-class', $instance->getBrandContainerClass());
    }

    public function testBrandLinkClass(): void
    {
        $instance = new class () {
            use HasBrand;

            public function getBrandLinkClass(): string
            {
                return $this->brandLinkAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->brandLinkClass('')->getBrandLinkClass());

        $instance = $instance->brandLinkClass('test-class');

        $this->assertSame('test-class', $instance->getBrandLinkClass());

        $instance = $instance->brandLinkClass('test-class-1');

        $this->assertSame('test-class test-class-1', $instance->getBrandLinkClass());

        $instance = $instance->brandLinkClass('test-override-class', true);

        $this->assertSame('test-override-class', $instance->getBrandLinkClass());
    }

    public function testImmutablity(): void
    {
        $instance = new class () {
            use HasBrand;
        };

        $this->assertNotSame($instance, $instance->brandContainer(false));
        $this->assertNotSame($instance, $instance->brandContainerAttributes([]));
        $this->assertNotSame($instance, $instance->brandContainerClass(''));
        $this->assertNotSame($instance, $instance->brandContainerTag('div'));
        $this->assertNotSame($instance, $instance->brandImage(''));
        $this->assertNotSame($instance, $instance->brandLink(''));
        $this->assertNotSame($instance, $instance->brandLinkAttributes([]));
        $this->assertNotSame($instance, $instance->brandLinkClass(''));
        $this->assertNotSame($instance, $instance->brandTemplate(''));
        $this->assertNotSame($instance, $instance->brandText(''));
        $this->assertNotSame($instance, $instance->brandToggle(''));
    }
}
