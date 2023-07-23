<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasPrefixAndSuffix;
use PHPUnit\Framework\TestCase;
use Stringable;

final class HasPrefixAndSuffixTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class() {
            use HasPrefixAndSuffix;
        };

        $this->assertNotSame($instance, $instance->prefix(''));
        $this->assertNotSame($instance, $instance->suffix(''));
    }

    public function testPrefixStringable(): void
    {
        $instance = new class() {
            use HasPrefixAndSuffix;

            public function getPrefix(): string
            {
                return $this->prefix;
            }
        };

        $prefix = new class() implements Stringable {
            public function __toString(): string
            {
                return '<foo && bar>';
            }
        };

        $this->assertEmpty($instance->getPrefix());
        $this->assertSame('<foo && bar>', $instance->prefix($prefix)->getPrefix());
    }

    public function testPrefixStringText(): void
    {
        $instance = new class() {
            use HasPrefixAndSuffix;

            public function getPrefix(): string
            {
                return $this->prefix;
            }
        };

        $this->assertEmpty($instance->prefix('<foo>')->getPrefix());
        $this->assertSame('foo', $instance->prefix('foo')->getPrefix());
        $this->assertSame('foo &amp;&amp; bar', $instance->prefix('foo && bar')->getPrefix());
    }

    public function testPrefixStringTag(): void
    {
        $instance = new class() {
            use HasPrefixAndSuffix;

            public function getPrefix(): string
            {
                return $this->prefix;
            }
        };

        $this->assertEmpty($instance->prefix('<invalid_tag>')->getPrefix());
        $this->assertSame(
            '<i class=&quot;bi bi-foo&quot;></i>',
            $instance->prefix('<i class="bi bi-foo"></i>')->getPrefix(),
        );
    }

    public function testSuffixStringable(): void
    {
        $instance = new class() {
            use HasPrefixAndSuffix;

            public function getSuffix(): string
            {
                return $this->suffix;
            }
        };

        $suffix = new class() implements Stringable {
            public function __toString(): string
            {
                return '<foo && bar>';
            }
        };

        $this->assertEmpty($instance->getSuffix());
        $this->assertSame('<foo && bar>', $instance->suffix($suffix)->getSuffix());
    }

    public function testSuffixStringText(): void
    {
        $instance = new class() {
            use HasPrefixAndSuffix;

            public function getSuffix(): string
            {
                return $this->suffix;
            }
        };

        $this->assertEmpty($instance->suffix('<foo>')->getsuffix());
        $this->assertSame('foo', $instance->suffix('foo')->getSuffix());
        $this->assertSame('foo &amp;&amp; bar', $instance->suffix('foo && bar')->getSuffix());
    }

    public function testSuffixStringTag(): void
    {
        $instance = new class() {
            use HasPrefixAndSuffix;

            public function getSuffix(): string
            {
                return $this->suffix;
            }
        };

        $this->assertEmpty($instance->suffix('<invalid_tag>')->getSuffix());
        $this->assertSame(
            '<i class=&quot;bi bi-foo&quot;></i>',
            $instance->suffix('<i class="bi bi-foo"></i>')->getSuffix(),
        );
    }
}
