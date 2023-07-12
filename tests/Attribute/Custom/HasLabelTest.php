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
        $instance = new class () {
            use HasLabel;
        };

        $this->assertNotSame($instance, $instance->labelAttributes([]));
        $this->assertNotSame($instance, $instance->labelClass(''));
        $this->assertNotSame($instance, $instance->labelClosure(static fn (): string => ''));
        $this->assertNotSame($instance, $instance->labelContent(''));
        $this->assertNotSame($instance, $instance->labelFor(''));
        $this->assertNotSame($instance, $instance->notLabel());
    }

    public function testIsLabel(): void
    {
        $instance = new class () {
            use HasLabel;

            public function getIsLabel(): bool
            {
                return $this->isLabel();
            }
        };

        $this->assertFalse($instance->notLabel()->getIsLabel());
        $this->assertTrue($instance->getIsLabel());
    }

    public function testLabelClass(): void
    {
        $instance = new class () {
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
        $instance = new class () {
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
        $instance = new class () {
            use HasLabel;

            public function getLabelContent(): string
            {
                return $this->labelContent;
            }
        };

        $this->assertSame('foo &amp; bar', $instance->labelContent('foo & bar')->getLabelContent());
        $this->assertSame('foo & bar', $instance->labelContent('foo & bar', false)->getLabelContent());
    }

    public function testNotLabel(): void
    {
        $instance = new class () {
            use HasLabel;

            public function getNotLabel(): bool
            {
                return $this->notLabel;
            }
        };

        $this->assertFalse($instance->getNotLabel());
        $this->assertTrue($instance->notLabel()->getNotLabel());
    }
}
