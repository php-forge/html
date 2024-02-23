<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\{Attribute\Custom\HasPrefixItems, Textual\Span};
use PHPUnit\Framework\TestCase;

final class HasPrefixItemsTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasPrefixItems;
        };

        $this->assertNotSame($instance, $instance->prefixItems(''));
    }

    public function testRender(): void
    {
        $instance = new class () {
            use HasPrefixItems;

            public function getPrefixItems(): string
            {
                return $this->prefixItems;
            }
        };

        $instance = $instance->prefixItems(Span::widget(), 'prefix');

        $this->assertSame('<span></span>prefix', $instance->getPrefixItems());
    }

    public function testRenderWithXSS(): void
    {
        $instance = new class () {
            use HasPrefixItems;

            public function getPrefixItems(): string
            {
                return $this->prefixItems;
            }
        };

        $instance = $instance->prefixItems(Span::widget(), "<script>alert('Hack');</script>");

        $this->assertSame('<span></span>', $instance->getPrefixItems());
    }
}
