<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use InvalidArgumentException;
use PHPForge\{Html\Attribute\Custom\HasPrefixCollection, Html\Textual\Span, Support\Assert};
use PHPUnit\Framework\TestCase;

final class HasPrefixCollectionTest extends TestCase
{
    public function testContainerClass(): void
    {
        $instance = new class () {
            use HasPrefixCollection;

            public function getPrefixContainerClass(): string
            {
                return $this->prefixContainerAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getPrefixContainerClass());

        $instance = $instance->prefixContainerClass('class');

        $this->assertSame('class', $instance->getPrefixContainerClass());

        $instance = $instance->prefixContainerClass('class-1');

        $this->assertSame('class class-1', $instance->getPrefixContainerClass());

        $instance = $instance->prefixContainerClass('override-class', true);

        $this->assertSame('override-class', $instance->getPrefixContainerClass());
    }

    public function testContainerTagException(): void
    {
        $instance = new class () {
            use HasPrefixCollection;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The prefix container tag must be a non-empty string.');

        $instance->prefixContainerTag('');
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasPrefixCollection;
        };

        $this->assertNotSame($instance, $instance->prefix(''));
        $this->assertNotSame($instance, $instance->prefixContainer(false));
        $this->assertNotSame($instance, $instance->prefixContainerAttributes([]));
        $this->assertNotSame($instance, $instance->prefixContainerClass(''));
        $this->assertNotSame($instance, $instance->prefixContainerTag('span'));
    }

    public function testRender(): void
    {
        $instance = new class () {
            use HasPrefixCollection;

            public function run(): string
            {
                return $this->renderPrefixTag();
            }
        };

        $instance = $instance->prefix('prefix')->prefixContainer(false);

        $this->assertStringNotContainsString('<div>', $instance->run());
        Assert::equalsWithoutLE(
            <<<HTML
            prefix
            HTML,
            $instance->run()
        );
    }

    public function testRenderWithContainerTrue(): void
    {
        $instance = new class () {
            use HasPrefixCollection;

            public function run(): string
            {
                return $this->renderPrefixTag();
            }
        };

        $instance = $instance->prefix('prefix')->prefixContainer(true);

        $this->assertStringContainsString('<div>', $instance->run());
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            prefix
            </div>
            HTML,
            $instance->run()
        );
    }

    public function testRenderWithXSS(): void
    {
        $instance = new class () {
            use HasPrefixCollection;

            public function getPrefix(): string
            {
                return $this->prefix;
            }
        };

        $instance = $instance->prefix(Span::widget(), "<script>alert('Hack');</script>");

        $this->assertSame('<span></span>', $instance->getPrefix());
    }
}
