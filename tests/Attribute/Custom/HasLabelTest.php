<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use Closure;
use PHPForge\Html\Attribute\Custom\HasLabel;
use PHPForge\Html\Span;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

final class HasLabelTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class() {
            use HasLabel;
        };

        $this->assertNotSame($instance, $instance->labelAttributes([]));
        $this->assertNotSame($instance, $instance->labelClass(''));
        $this->assertNotSame($instance, $instance->labelClosure(static fn (): string => ''));
        $this->assertNotSame($instance, $instance->labelContent(''));
        $this->assertNotSame($instance, $instance->labelContentTag(Span::widget()));
        $this->assertNotSame($instance, $instance->labelFor(''));
        $this->assertNotSame($instance, $instance->notLabel());
    }

    public function testIsNotLabel(): void
    {
        $instance = new class() {
            use HasLabel;

            public function getIsNotLabel(): bool
            {
                return $this->isNotLabel();
            }
        };

        $this->assertTrue($instance->notLabel()->getIsNotLabel());
        $this->assertFalse($instance->getIsNotLabel());
    }

    public function testLabelClass(): void
    {
        $instance = new class() {
            use HasLabel;

            public function getLabelClass(): string
            {
                return $this->labelAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getLabelClass());

        $instance = $instance->labelClass('foo');

        $this->assertSame('foo', $instance->getLabelClass());

        $instance = $instance->labelClass('bar');

        $this->assertSame('foo bar', $instance->getLabelClass());
    }

    public function testLabelClosure(): void
    {
        $instance = new class() {
            use HasLabel;

            public function getLabelClosure(): Closure|null
            {
                return $this->labelClosure;
            }
        };

        $this->assertNull($instance->getLabelClosure());

        $instance = $instance->labelClosure(static fn (): string => 'foo');

        $this->assertInstanceOf(Closure::class, $instance->getLabelClosure());
    }

    public function testLabelContent(): void
    {
        $instance = new class() {
            use HasLabel;

            public function getLabelContent(): string
            {
                return $this->labelContent;
            }
        };

        $instance = $instance->labelContent('foo && bar');

        $this->assertSame('foo &amp;&amp; bar', $instance->getLabelContent());

        $instance = $instance->labelContentTag(Span::widget());

        Assert::equalsWithoutLE(
            <<<HTML
            foo &amp;&amp; bar
            <span></span>
            HTML,
            $instance->getLabelContent(),
        );
    }

    public function testLabelContentWithChangeOrder(): void
    {
        $instance = new class() {
            use HasLabel;

            public function getLabelContent(): string
            {
                return $this->labelContent;
            }
        };

        $instance = $instance->labelContentTag(Span::widget());

        $this->assertSame('<span></span>', $instance->getLabelContent());

        $instance = $instance->labelContent('foo && bar');

        Assert::equalsWithoutLE(
            <<<HTML
            <span></span>
            foo &amp;&amp; bar
            HTML,
            $instance->getLabelContent(),
        );
    }


    public function testNotLabel(): void
    {
        $instance = new class() {
            use HasLabel;
        };

        $this->assertFalse($instance->isNotLabel());
        $this->assertTrue($instance->notLabel()->isNotLabel());
    }
}
