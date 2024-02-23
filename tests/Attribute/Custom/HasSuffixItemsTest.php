<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\{Attribute\Custom\HasSuffixItems, Textual\Span};
use PHPUnit\Framework\TestCase;

final class HasSuffixItemsTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasSuffixItems;
        };

        $this->assertNotSame($instance, $instance->suffixItems(''));
    }

    public function testRender(): void
    {
        $instance = new class () {
            use HasSuffixItems;

            public function getSuffixItems(): string
            {
                return $this->suffixItems;
            }
        };

        $instance = $instance->suffixItems('suffix', Span::widget());

        $this->assertSame('suffix<span></span>', $instance->getSuffixItems());
    }

    public function testRenderWithXSS(): void
    {
        $instance = new class () {
            use HasSuffixItems;

            public function getSuffixItems(): string
            {
                return $this->suffixItems;
            }
        };

        $instance = $instance->suffixItems("<script>alert('Hack');</script>", Span::widget());

        $this->assertSame('<span></span>', $instance->getSuffixItems());
    }
}
