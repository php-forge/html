<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasContent;
use PHPUnit\Framework\TestCase;
use Stringable;

final class HasContentTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class() {
            use HasContent;

            protected string $containerTag = 'div';
        };

        $this->assertNotSame($instance, $instance->content(''));
    }

    public function testStringable(): void
    {
        $instance = new class() {
            use HasContent;

            public function getContent(): string
            {
                return $this->content;
            }
        };

        $this->assertEmpty('', $instance->getContent());

        $instance = $instance->content(
            new class() implements Stringable {
                public function __toString(): string
                {
                    return '<foo && bar>';
                }
            },
        );

        $this->assertSame('<foo && bar>', $instance->getContent());
    }

    public function testStringText(): void
    {
        $instance = new class() {
            use HasContent;

            public function getContent(): string
            {
                return $this->content;
            }
        };

        $this->assertEmpty($instance->content('<foo>')->getContent());
        $this->assertSame('foo', $instance->content('foo')->getContent());
        $this->assertSame('foo &amp;&amp; bar', $instance->content('foo && bar')->getContent());
    }

    public function testStringTag(): void
    {
        $instance = new class() {
            use HasContent;

            public function getContent(): string
            {
                return $this->content;
            }
        };

        $this->assertEmpty($instance->content('<invalid_tag>')->getContent());
        $this->assertSame(
            '<i class="bi bi-foo"></i>',
            $instance->content('<i class="bi bi-foo"></i>')->getContent(),
        );
    }
}
