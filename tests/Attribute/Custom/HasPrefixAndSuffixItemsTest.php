<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasPrefixAndSuffixItems;
use PHPForge\Html\Textual\Span;
use PHPUnit\Framework\TestCase;

final class HasPrefixAndSuffixItemsTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasPrefixAndSuffixItems;
        };

        $this->assertNotSame($instance, $instance->prefixItems(''));
        $this->assertNotSame($instance, $instance->suffixItems(''));
    }

    public function testPrefixItems(): void
    {
        $instance = new class () {
            use HasPrefixAndSuffixItems;

            public function getPrefixItems(): string
            {
                return $this->prefixItems;
            }
        };

        $instance = $instance->prefixItems(Span::widget(), 'foo && bar');

        $this->assertSame('<span></span>foo && bar', $instance->getPrefixItems());
    }

    public function testPrefixItemsWithXSS(): void
    {
        $instance = new class () {
            use HasPrefixAndSuffixItems;

            public function getPrefixItems(): string
            {
                return $this->prefixItems;
            }
        };

        $instance = $instance->prefixItems(Span::widget(), "<script>alert('Hack');</script>");

        $this->assertSame('<span></span>', $instance->getPrefixItems());
    }

    public function testSuffixItems(): void
    {
        $instance = new class () {
            use HasPrefixAndSuffixItems;

            public function getSuffixItems(): string
            {
                return $this->suffixItems;
            }
        };

        $instance = $instance->suffixItems('foo && bar', Span::widget());

        $this->assertSame('foo && bar<span></span>', $instance->getSuffixItems());
    }

    public function testSuffixItemsWithXSS(): void
    {
        $instance = new class () {
            use HasPrefixAndSuffixItems;

            public function getSuffixItems(): string
            {
                return $this->suffixItems;
            }
        };

        $instance = $instance->suffixItems("<script>alert('Hack');</script>", Span::widget());

        $this->assertSame('<span></span>', $instance->getSuffixItems());
    }
}
