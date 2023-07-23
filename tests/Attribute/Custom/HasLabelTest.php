<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use Closure;
use PHPForge\Html\Attribute\Custom\HasLabel;
use PHPUnit\Framework\TestCase;
use Stringable;

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

    public function testLabelContentStringable(): void
    {
        $instance = new class() {
            use HasLabel;

            public function getLabelContent(): string
            {
                return $this->labelContent;
            }
        };

        $label = new class() implements Stringable {
            public function __toString(): string
            {
                return '<foo && bar>';
            }
        };

        $this->assertEmpty($instance->getLabelContent());
        $this->assertSame('<foo && bar>', $instance->labelContent($label)->getLabelContent());
    }

    public function testLabelContentStringText(): void
    {
        $instance = new class() {
            use HasLabel;

            public function getLabelContent(): string
            {
                return $this->labelContent;
            }
        };

        $this->assertEmpty($instance->labelContent('<foo>')->getLabelContent());
        $this->assertSame('foo', $instance->labelContent('foo')->getLabelContent());
        $this->assertSame('foo &amp;&amp; bar', $instance->labelContent('foo && bar')->getLabelContent());
    }

    public function testLabelContentStringTag(): void
    {
        $instance = new class() {
            use HasLabel;

            public function getLabelContent(): string
            {
                return $this->labelContent;
            }
        };

        $this->assertEmpty($instance->labelContent('<invalid_tag>')->getLabelContent());
        $this->assertSame(
            '<i class=&quot;bi bi-foo&quot;></i>',
            $instance->labelContent('<i class="bi bi-foo"></i>')->getLabelContent(),
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
