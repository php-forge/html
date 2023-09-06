<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Component;

use PHPForge\Html\Attribute\Component\HasLink;
use PHPUnit\Framework\TestCase;

final class HasLinkTest extends TestCase
{
    public function testAttributes(): void
    {
        $instance = new class() {
            use HasLink;

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
            use HasLink;

            public function getLinkAttributes(): array
            {
                return $this->linkAttributes;
            }
        };

        $this->assertSame(['class' => 'test-class'], $instance->linkClass('test-class')->getLinkAttributes());
    }

    public function testGetLink(): void
    {
        $instance = new class() {
            use HasLink;
        };

        $this->assertSame('test-link', $instance->link('test-link')->getLink());
    }

    public function testGetLinkAttributes(): void
    {
        $instance = new class() {
            use HasLink;
        };

        $this->assertSame(['class' => 'test-class'], $instance->linkAttributes(['class' => 'test-class'])->getLinkAttributes());
    }

    public function testImmutablity(): void
    {
        $instance = new class() {
            use HasLink;
        };

        $this->assertNotSame($instance, $instance->link(''));
        $this->assertNotSame($instance, $instance->linkAttributes([]));
        $this->assertNotSame($instance, $instance->linkClass(''));
    }
}