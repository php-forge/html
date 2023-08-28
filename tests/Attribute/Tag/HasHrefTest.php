<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Tag;

use PHPForge\Html\Attribute\Tag\HasHref;
use PHPUnit\Framework\TestCase;

final class HasHrefTest extends TestCase
{
    public function testAttributes(): void
    {
        $instance = new class() {
            use HasHref;

            public function getHrefAttributes(): array
            {
                return $this->hrefAttributes;
            }
        };

        $instance = $instance->hrefAttributes(['class' => 'foo']);
        $instance = $instance->hrefAttributes(['disabled' => true]);

        $this->assertSame(['class' => 'foo', 'disabled' => true], $instance->getHrefAttributes());
    }

    public function testClass(): void
    {
        $instance = new class() {
            use HasHref;

            public function getHrefAttributes(): array
            {
                return $this->hrefAttributes;
            }
        };

        $this->assertSame(['class' => 'test-class'], $instance->hrefClass('test-class')->getHrefAttributes());
    }

    public function testImmutablity(): void
    {
        $instance = new class() {
            use HasHref;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->href(''));
        $this->assertNotSame($instance, $instance->hrefAttributes([]));
        $this->assertNotSame($instance, $instance->hrefClass(''));
    }
}
