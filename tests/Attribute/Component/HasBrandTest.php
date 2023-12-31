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

        $instance = $instance->brandContainerClass('class');
        $this->assertSame('class', $instance->getBrandContainerClass());

        $instance = $instance->brandContainerClass('class-1');

        $this->assertSame('class class-1', $instance->getBrandContainerClass());

        $instance = $instance->brandContainerClass('override-class', true);

        $this->assertSame('override-class', $instance->getBrandContainerClass());
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

        $instance = $instance->brandLinkClass('class');

        $this->assertSame('class', $instance->getBrandLinkClass());

        $instance = $instance->brandLinkClass('class-1');

        $this->assertSame('class class-1', $instance->getBrandLinkClass());

        $instance = $instance->brandLinkClass('override-class', true);

        $this->assertSame('override-class', $instance->getBrandLinkClass());
    }

    public function testImmutability(): void
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
