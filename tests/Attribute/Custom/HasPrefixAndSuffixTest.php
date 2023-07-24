<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasPrefixAndSuffix;
use PHPForge\Html\Span;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

final class HasPrefixAndSuffixTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class() {
            use HasPrefixAndSuffix;
        };

        $this->assertNotSame($instance, $instance->prefix(''));
        $this->assertNotSame($instance, $instance->prefixTag(Span::widget()));
        $this->assertNotSame($instance, $instance->suffix(''));
        $this->assertNotSame($instance, $instance->suffixTag(Span::widget()));
    }

    public function testPrefix(): void
    {
        $instance = new class() {
            use HasPrefixAndSuffix;

            public function getPrefix(): string
            {
                return $this->prefix;
            }
        };

        $instance = $instance->prefix('foo && bar');

        $this->assertSame('foo &amp;&amp; bar', $instance->getPrefix());

        $instance = $instance->prefixTag(Span::widget());

        Assert::equalsWithoutLE(
            <<<HTML
            foo &amp;&amp; bar
            <span></span>
            HTML,
            $instance->getPrefix(),
        );
    }

    public function testPrefixWithChangeOrder(): void
    {
        $instance = new class() {
            use HasPrefixAndSuffix;

            public function getPrefix(): string
            {
                return $this->prefix;
            }
        };

        $instance = $instance->prefixTag(Span::widget());

        $this->assertSame('<span></span>', $instance->getPrefix());

        $instance = $instance->prefix('foo && bar');

        Assert::equalsWithoutLE(
            <<<HTML
            <span></span>
            foo &amp;&amp; bar
            HTML,
            $instance->getPrefix(),
        );
    }

    public function testSuffix(): void
    {
        $instance = new class() {
            use HasPrefixAndSuffix;

            public function getSuffix(): string
            {
                return $this->suffix;
            }
        };

        $instance = $instance->suffix('foo && bar');

        $this->assertSame('foo &amp;&amp; bar', $instance->getSuffix());

        $instance = $instance->suffixTag(Span::widget());

        Assert::equalsWithoutLE(
            <<<HTML
            foo &amp;&amp; bar
            <span></span>
            HTML,
            $instance->getSuffix(),
        );
    }

    public function testSuffixWithChangeOrder(): void
    {
        $instance = new class() {
            use HasPrefixAndSuffix;

            public function getSuffix(): string
            {
                return $this->suffix;
            }
        };

        $instance = $instance->suffixTag(Span::widget());

        $this->assertSame('<span></span>', $instance->getSuffix());

        $instance = $instance->suffix('foo && bar');

        Assert::equalsWithoutLE(
            <<<HTML
            <span></span>
            foo &amp;&amp; bar
            HTML,
            $instance->getSuffix(),
        );
    }
}
