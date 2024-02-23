<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use InvalidArgumentException;
use PHPForge\{Html\Attribute\Custom\HasSuffixCollection, Html\Textual\Span, Support\Assert};
use PHPUnit\Framework\TestCase;

final class HasSuffixCollectionTest extends TestCase
{
    public function testContainerClass(): void
    {
        $instance = new class () {
            use HasSuffixCollection;

            public function getSuffixContainerClass(): string
            {
                return $this->suffixContainerAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getSuffixContainerClass());

        $instance = $instance->suffixContainerClass('test-class');

        $this->assertSame('test-class', $instance->getSuffixContainerClass());

        $instance = $instance->suffixContainerClass('test-class-1');

        $this->assertSame('test-class test-class-1', $instance->getSuffixContainerClass());

        $instance = $instance->suffixContainerClass('test-override-class', true);

        $this->assertSame('test-override-class', $instance->getSuffixContainerClass());
    }

    public function testContainerTagException(): void
    {
        $instance = new class () {
            use HasSuffixCollection;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The suffix container tag must be a non-empty string.');

        $instance->suffixContainerTag('');
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasSuffixCollection;
        };

        $this->assertNotSame($instance, $instance->suffix(''));
        $this->assertNotSame($instance, $instance->suffixContainer(false));
        $this->assertNotSame($instance, $instance->suffixContainerAttributes([]));
        $this->assertNotSame($instance, $instance->suffixContainerClass(''));
        $this->assertNotSame($instance, $instance->suffixContainerTag('span'));
    }

    public function testRender(): void
    {
        $instance = new class () {
            use HasSuffixCollection;

            public function getSuffix(): string
            {
                return $this->suffix;
            }

            public function run(): string
            {
                return $this->renderSuffixTag();
            }
        };

        $instance = $instance->suffix('suffix', Span::widget());

        $this->assertSame('suffix<span></span>', $instance->getSuffix());

        Assert::equalsWithoutLE(
            <<<HTML
            suffix<span></span>
            HTML,
            $instance->run()
        );
    }

    public function testRenderWithXSS(): void
    {
        $instance = new class () {
            use HasSuffixCollection;

            public function getSuffix(): string
            {
                return $this->suffix;
            }
        };

        $instance = $instance->suffix("<script>alert('Hack');</script>", Span::widget());

        $this->assertSame('<span></span>', $instance->getSuffix());
    }
}
