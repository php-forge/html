<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasPrefixAndSuffixItems;
use PHPForge\Html\Span;
use PHPUnit\Framework\TestCase;

final class HasPrefixAndSuffixItemsTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class() {
            use HasPrefixAndSuffixItems;
        };

        $this->assertNotSame($instance, $instance->prefixItems(''));
        $this->assertNotSame($instance, $instance->suffixItems(''));
    }

    public function testPrefixItems(): void
    {
        $instance = new class() {
            use HasPrefixAndSuffixItems;

            public function getPrefixItems(): string
            {
                return $this->prefixItems;
            }
        };

        $instance = $instance->prefixItems(Span::widget(), 'foo && bar');

        $this->assertSame('<span></span>foo &amp;&amp; bar', $instance->getPrefixItems());
    }

    public function testSuffixItems(): void
    {
        $instance = new class() {
            use HasPrefixAndSuffixItems;

            public function getSuffixItems(): string
            {
                return $this->suffixItems;
            }
        };

        $instance = $instance->suffixItems('foo && bar', Span::widget());

        $this->assertSame('foo &amp;&amp; bar<span></span>', $instance->getSuffixItems());
    }
}
