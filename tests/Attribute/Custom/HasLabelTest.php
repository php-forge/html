<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use Closure;
use PHPForge\Html\Attribute\Custom\HasLabel;
use PHPUnit\Framework\TestCase;

final class HasLabelTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class() {
            use HasLabel;
        };

        $this->assertNotSame($instance, $instance->label(''));
        $this->assertNotSame($instance, $instance->labelAttributes([]));
        $this->assertNotSame($instance, $instance->labelClass(''));
        $this->assertNotSame($instance, $instance->labelClosure(static fn (): string => ''));
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

    public function testLabelEncode(): void
    {
        $instance = new class() {
            use HasLabel;

            public function getLabel(): string
            {
                return $this->label;
            }
        };

        $this->assertSame('foo &amp; bar', $instance->label('foo & bar')->getLabel());
        $this->assertSame('foo & bar', $instance->label('foo & bar', false)->getLabel());
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
