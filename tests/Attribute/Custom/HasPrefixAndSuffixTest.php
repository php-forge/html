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
        $instance = new class () {
            use HasPrefixAndSuffix;
        };

        $this->assertNotSame($instance, $instance->prefix(''));
        $this->assertNotSame($instance, $instance->suffix(''));
    }

    public function testPrefix(): void
    {
        $instance = new class () {
            use HasPrefixAndSuffix;

            protected array $attributes = [];

            public function getPrefix(): string
            {
                return $this->prefix;
            }
        };

        $this->assertEmpty($instance->getPrefix());
        $this->assertSame('foo', $instance->prefix('foo')->getPrefix());
        $this->assertSame('&lt;foo &amp;&amp; bar&gt;', $instance->prefix('<foo && bar>')->getPrefix());
    }

    public function testPrefixStringableSpecialChar(): void
    {
        $instance = new class () {
            use HasPrefixAndSuffix;

            protected array $attributes = [];

            public function getPrefix(): string
            {
                return $this->prefix;
            }
        };

        $prefix = new class () implements Stringable {
            public function __toString(): string
            {
                return 'foo && bar';
            }
        };

        $this->assertEmpty($instance->getPrefix());
        $this->assertSame('foo && bar', $instance->prefix($prefix)->getPrefix());
    }

    public function testPrefixStringable(): void
    {
        $instance = new class () {
            use HasPrefixAndSuffix;

            protected array $attributes = [];

            public function getPrefix(): string
            {
                return $this->prefix;
            }
        };

        $prefix = new class () implements Stringable {
            public function __toString(): string
            {
                return 'foo';
            }
        };

        $this->assertEmpty($instance->getPrefix());
        $this->assertSame('foo', $instance->prefix($prefix)->getPrefix());
    }

    public function testSuffix(): void
    {
        $instance = new class () {
            use HasPrefixAndSuffix;

            protected array $attributes = [];

            public function getSuffix(): string
            {
                return $this->suffix;
            }
        };

        $this->assertEmpty($instance->getSuffix());
        $this->assertSame('foo', $instance->suffix('foo')->getSuffix());
        $this->assertSame('&lt;foo &amp;&amp; bar&gt;', $instance->suffix('<foo && bar>')->getSuffix());
    }

    public function testSuffixStringableSpecialChar(): void
    {
        $instance = new class () {
            use HasPrefixAndSuffix;

            protected array $attributes = [];

            public function getSuffix(): string
            {
                return $this->suffix;
            }
        };

        $suffix = new class () implements Stringable {
            public function __toString(): string
            {
                return 'bar && baz';
            }
        };

        $this->assertEmpty($instance->getSuffix());
        $this->assertSame('bar && baz', $instance->suffix($suffix)->getSuffix());
    }

    public function testSuffixStringable(): void
    {
        $instance = new class () {
            use HasPrefixAndSuffix;

            protected array $attributes = [];

            public function getSuffix(): string
            {
                return $this->suffix;
            }
        };

        $suffix = new class () implements Stringable {
            public function __toString(): string
            {
                return 'bar';
            }
        };

        $this->assertEmpty($instance->getSuffix());
        $this->assertSame('bar', $instance->suffix($suffix)->getSuffix());
    }
}
