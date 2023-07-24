<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasContent;
use PHPForge\Html\Span;
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

        $instance = $instance->content(
            Span::widget(),
            'foo && bar',
        );

        $this->assertSame('<span></span>foo &amp;&amp; bar', $instance->getContent());
    }
}
