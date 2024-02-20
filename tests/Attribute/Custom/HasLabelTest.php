<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasLabel;
use PHPForge\Html\FormControl\Input\Base\AbstractButton;
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

        $instance = $instance->labelClass('class');

        $this->assertSame('class', $instance->getLabelClass());

        $instance = $instance->labelClass('class-1');

        $this->assertSame('class class-1', $instance->getLabelClass());

        $instance = $instance->labelClass('override-class', true);

        $this->assertSame('override-class', $instance->getLabelClass());
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

    public function testNotLabel(): void
    {
        $instance = new class () {
            use HasLabel;

            public function isNotLabel(): bool
            {
                return $this->notLabel;
            }
        };

        $this->assertFalse($instance->isNotLabel());
        $this->assertTrue($instance->notLabel()->isNotLabel());
    }

    public function testRenderLabelTag(): void
    {
        $instance = new class () extends AbstractButton {
            public function run(): string
            {
                return $this->renderLabelTag();
            }
        };

        $this->assertSame('<label>content</label>', $instance->labelContent('content')->run());
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
