<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasLabel;
use PHPForge\Html\Span;
use PHPUnit\Framework\TestCase;

final class HasLabelTest extends TestCase
{
    public function testClass(): void
    {
        $instance = new class () {
            use HasLabel;

            public function getLabelClass(): string
            {
                return $this->labelAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getLabelClass());

        $instance = $instance->labelClass('test-class');

        $this->assertSame('test-class', $instance->getLabelClass());

        $instance = $instance->labelClass('test-class-1');

        $this->assertSame('test-class test-class-1', $instance->getLabelClass());

        $instance = $instance->labelClass('test-override-class', true);

        $this->assertSame('test-override-class', $instance->getLabelClass());
    }

    public function testContent(): void
    {
        $instance = new class () {
            use HasLabel;

            public function getLabelContent(): string
            {
                return $this->labelContent;
            }
        };

        $instance = $instance->labelContent('foo && bar', Span::widget()->content('foo && bar'));

        $this->assertSame('foo && bar<span>foo && bar</span>', $instance->getLabelContent());
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasLabel;
        };

        $this->assertNotSame($instance, $instance->labelAttributes([]));
        $this->assertNotSame($instance, $instance->labelClass(''));
        $this->assertNotSame($instance, $instance->labelContent(''));
        $this->assertNotSame($instance, $instance->labelFor(''));
        $this->assertNotSame($instance, $instance->notLabel());
    }

    public function testIsNotLabel(): void
    {
        $instance = new class () {
            use HasLabel;

            public function getIsNotLabel(): bool
            {
                return $this->isNotLabel();
            }
        };

        $this->assertTrue($instance->notLabel()->getIsNotLabel());
        $this->assertFalse($instance->getIsNotLabel());
    }

    public function testNotLabel(): void
    {
        $instance = new class () {
            use HasLabel;
        };

        $this->assertFalse($instance->isNotLabel());
        $this->assertTrue($instance->notLabel()->isNotLabel());
    }

    public function testXSS(): void
    {
        $instance = new class () {
            use HasLabel;

            public function getLabelContent(): string
            {
                return $this->labelContent;
            }
        };

        $instance = $instance->labelContent("<script>alert('Hack');</script>", Span::widget()->content('foo && bar'));

        $this->assertSame('<span>foo && bar</span>', $instance->getLabelContent());
    }
}
