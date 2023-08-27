<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use InvalidArgumentException;
use PHPForge\Html\Attribute\Custom\HasPrefixAndSuffix;
use PHPForge\Html\Span;
use PHPUnit\Framework\TestCase;

final class HasPrefixAndSuffixTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class() {
            use HasPrefixAndSuffix;
        };

        $this->assertNotSame($instance, $instance->prefix(''));
        $this->assertNotSame($instance, $instance->prefixContainer(false));
        $this->assertNotSame($instance, $instance->prefixContainerAttributes([]));
        $this->assertNotSame($instance, $instance->prefixContainerClass(''));
        $this->assertNotSame($instance, $instance->prefixContainerTag('span'));
        $this->assertNotSame($instance, $instance->suffix(''));
        $this->assertNotSame($instance, $instance->suffixContainer(false));
        $this->assertNotSame($instance, $instance->suffixContainerAttributes([]));
        $this->assertNotSame($instance, $instance->suffixContainerClass(''));
        $this->assertNotSame($instance, $instance->suffixContainerTag('span'));
        $this->assertNotSame($instance, $instance->toggleInPrefix(false));
        $this->assertNotSame($instance, $instance->toggleInSuffix(false));
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

        $instance = $instance->prefix(Span::widget(), 'foo && bar');

        $this->assertSame('<span></span>foo && bar', $instance->getPrefix());
    }

    public function testPrefixContainerClass(): void
    {
        $instance = new class() {
            use HasPrefixAndSuffix;

            public function getPrefixContainerClass(): string
            {
                return $this->prefixContainerAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getPrefixContainerClass());

        $instance = $instance->prefixContainerClass('foo');

        $this->assertSame('foo', $instance->getPrefixContainerClass());

        $instance = $instance->prefixContainerClass('bar');

        $this->assertSame('foo bar', $instance->getPrefixContainerClass());
    }

    public function testPrefixContainerTagException(): void
    {
        $instance = new class() {
            use HasPrefixAndSuffix;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The prefix container tag must be a non-empty string.');

        $instance->prefixContainerTag('');
    }

    public function testPrefixWithXSS(): void
    {
        $instance = new class() {
            use HasPrefixAndSuffix;

            public function getPrefix(): string
            {
                return $this->prefix;
            }
        };

        $instance = $instance->prefix(Span::widget(), "<script>alert('Hack');</script>");

        $this->assertSame("<span></span>", $instance->getPrefix());
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

        $instance = $instance->suffix('foo && bar', Span::widget());

        $this->assertSame('foo && bar<span></span>', $instance->getSuffix());
    }

    public function testSuffixContainerClass(): void
    {
        $instance = new class() {
            use HasPrefixAndSuffix;

            public function getSuffixContainerClass(): string
            {
                return $this->suffixContainerAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getSuffixContainerClass());

        $instance = $instance->suffixContainerClass('foo');

        $this->assertSame('foo', $instance->getSuffixContainerClass());

        $instance = $instance->suffixContainerClass('bar');

        $this->assertSame('foo bar', $instance->getSuffixContainerClass());
    }

    public function testSuffixContainerTagException(): void
    {
        $instance = new class() {
            use HasPrefixAndSuffix;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The suffix container tag must be a non-empty string.');

        $instance->suffixContainerTag('');
    }

    public function testSuffixWithXSS(): void
    {
        $instance = new class() {
            use HasPrefixAndSuffix;

            public function getSuffix(): string
            {
                return $this->suffix;
            }
        };

        $instance = $instance->suffix("<script>alert('Hack');</script>", Span::widget());

        $this->assertSame("<span></span>", $instance->getSuffix());
    }
}
