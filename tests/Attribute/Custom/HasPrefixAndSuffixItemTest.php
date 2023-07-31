<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasPrefixAndSuffixItem;
use PHPForge\Html\Span;
use PHPUnit\Framework\TestCase;

final class HasPrefixAndSuffixItemTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class() {
            use HasPrefixAndSuffixItem;
        };

        $this->assertNotSame($instance, $instance->prefixItem(''));
        $this->assertNotSame($instance, $instance->suffixItem(''));
    }

    public function testPrefixItem(): void
    {
        $instance = new class() {
            use HasPrefixAndSuffixItem;

            public function getPrefixItem(): string
            {
                return $this->prefixItem;
            }
        };

        $instance = $instance->prefixItem(Span::widget(), 'foo && bar');

        $this->assertSame('<span></span>foo &amp;&amp; bar', $instance->getPrefixItem());
    }

    public function testSuffixItem(): void
    {
        $instance = new class() {
            use HasPrefixAndSuffixItem;

            public function getSuffixItem(): string
            {
                return $this->suffixItem;
            }
        };

        $instance = $instance->suffixItem('foo && bar', Span::widget());

        $this->assertSame('foo &amp;&amp; bar<span></span>', $instance->getSuffixItem());
    }
}
