<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Component;

use PHPForge\Html\Attribute\Component\HasBrand;
use PHPUnit\Framework\TestCase;

final class HasBrandTest extends TestCase
{
    public function testBrandContainerClass(): void
    {
        $instance = new class() {
            use HasBrand;

            public function getBrandContainerAttributes(): array
            {
                return $this->brandContainerAttributes;
            }
        };

        $this->assertSame(
            [],
            $instance->brandContainerClass('')->getBrandContainerAttributes(),
        );
        $this->assertSame(
            ['class' => 'test-class'],
            $instance->brandContainerClass('test-class')->getBrandContainerAttributes(),
        );
    }

    public function testBrandLinkClass(): void
    {
        $instance = new class() {
            use HasBrand;

            public function getBrandLinkAttributes(): array
            {
                return $this->brandLinkAttributes;
            }
        };

        $this->assertSame([], $instance->brandLinkClass('')->getBrandLinkAttributes());
        $this->assertSame(['class' => 'test-class'], $instance->brandLinkClass('test-class')->getBrandLinkAttributes());
    }

    public function testImmutablity(): void
    {
        $instance = new class() {
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
