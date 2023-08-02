<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasContent;
use PHPForge\Html\Span;
use PHPUnit\Framework\TestCase;

final class HasContentTest extends TestCase
{
    public function testGetContent(): void
    {
        $instance = new class() {
            use HasContent;
        };

        $this->assertSame('', $instance->getContent());

        $instance = $instance->content('foo');

        $this->assertSame('foo', $instance->getContent());
    }

    public function testEncode(): void
    {
        $instance = new class() {
            use HasContent;
        };

        $instance = $instance->content(Span::widget(), 'foo && bar');

        $this->assertSame('<span></span>foo &amp;&amp; bar', $instance->getContent());
    }

    public function testImmutablity(): void
    {
        $instance = new class() {
            use HasContent;

            protected string $containerTag = 'div';
        };

        $this->assertNotSame($instance, $instance->content(''));
    }
}
