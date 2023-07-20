<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasContent;
use PHPUnit\Framework\TestCase;
use Stringable;

final class HasContentTest extends TestCase
{
    public function testEncode(): void
    {
        $instance = new class () {
            use HasContent;

            protected array $attributes = [];

            public function getContent(): string
            {
                return $this->content;
            }
        };

        $this->assertSame('foo', $instance->content('foo')->getContent());
        $this->assertSame('&lt;foo&gt;', $instance->content('<foo>')->getContent());
    }

    public function testImmutablity(): void
    {
        $instance = new class () {
            use HasContent;

            protected array $attributes = [];
            protected string $containerTag = 'div';
        };

        $this->assertNotSame($instance, $instance->content(''));
    }

    public function testStringable(): void
    {
        $instance = new class () {
            use HasContent;

            public function getContent(): string
            {
                return $this->content;
            }
        };

        $instance = $instance->content(
            new class () implements Stringable {
                public function __toString(): string
                {
                    return 'foo && bar';
                }
            },
        );

        $this->assertSame('foo && bar', $instance->getContent());
    }

    public function testStringableWithEncodeFalse(): void
    {
        $instance = new class () {
            use HasContent;

            public function getContent(): string
            {
                return $this->content;
            }
        };

        $instance = $instance->content(
            new class () implements Stringable {
                public function __toString(): string
                {
                    return 'foo';
                }
            },
            false,
        );

        $this->assertSame('foo', $instance->getContent());
    }
}
