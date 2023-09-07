<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Component;

use PHPForge\Html\Attribute\Component\HasLinkAttributes;
use PHPUnit\Framework\TestCase;

final class HasLinkAttributesTest extends TestCase
{
    public function testAttributes(): void
    {
        $instance = new class() {
            use HasLinkAttributes;

            public function getLinkAttributes(): array
            {
                return $this->linkAttributes;
            }
        };

        $instance = $instance->linkAttributes(['class' => 'foo']);
        $instance = $instance->linkAttributes(['disabled' => true]);

        $this->assertSame(['class' => 'foo', 'disabled' => true], $instance->getLinkAttributes());
    }

    public function testClass(): void
    {
        $instance = new class() {
            use HasLinkAttributes;

            public function getLinkAttributes(): array
            {
                return $this->linkAttributes;
            }
        };

        $this->assertSame(['class' => 'test-class'], $instance->linkClass('test-class')->getLinkAttributes());
    }

    public function testGetLinkAttributes(): void
    {
        $instance = new class() {
            use HasLinkAttributes;
        };

        $this->assertSame(['class' => 'test-class'], $instance->linkAttributes(['class' => 'test-class'])->getLinkAttributes());
    }

    public function testImmutablity(): void
    {
        $instance = new class() {
            use HasLinkAttributes;
        };

        $this->assertNotSame($instance, $instance->linkAttributes([]));
        $this->assertNotSame($instance, $instance->linkClass(''));
    }
}
