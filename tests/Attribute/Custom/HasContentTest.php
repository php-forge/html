<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasContent;
use PHPForge\Html\Span;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

final class HasContentTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class() {
            use HasContent;

            protected string $containerTag = 'div';
        };

        $this->assertNotSame($instance, $instance->content(''));
        $this->assertNotSame($instance, $instance->contentTag(Span::widget()));
    }

    public function testRender(): void
    {
        $instance = new class() {
            use HasContent;

            public function getContent(): string
            {
                return $this->content;
            }
        };

        $instance = $instance->content('foo && bar');

        $this->assertSame('foo &amp;&amp; bar', $instance->getContent());

        $instance = $instance->contentTag(Span::widget());

        Assert::equalsWithoutLE(
            <<<HTML
            foo &amp;&amp; bar
            <span></span>
            HTML,
            $instance->getContent(),
        );
    }

    public function testRenderWithChangeOrder(): void
    {
        $instance = new class() {
            use HasContent;

            public function getContent(): string
            {
                return $this->content;
            }
        };

        $instance = $instance->contentTag(Span::widget());

        $this->assertSame('<span></span>', $instance->getContent());

        $instance = $instance->content('foo && bar');

        Assert::equalsWithoutLE(
            <<<HTML
            <span></span>
            foo &amp;&amp; bar
            HTML,
            $instance->getContent(),
        );
    }
}
