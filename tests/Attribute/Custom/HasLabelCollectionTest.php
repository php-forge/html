<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasLabelCollection;
use PHPForge\Html\FormControl\Input\Base\AbstractButton;
use PHPForge\Html\Textual\Span;
use PHPUnit\Framework\TestCase;

final class HasLabelCollectionTest extends TestCase
{
    public function testClass(): void
    {
        $instance = new class () {
            use HasLabelCollection;

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
            use HasLabelCollection;

            public function getLabel(): string
            {
                return $this->label;
            }
        };

        $instance = $instance->label('foo && bar', Span::widget()->content('foo && bar'));

        $this->assertSame('foo && bar<span>foo && bar</span>', $instance->getLabel());
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasLabelCollection;
        };

        $this->assertNotSame($instance, $instance->label(''));
        $this->assertNotSame($instance, $instance->labelAttributes([]));
        $this->assertNotSame($instance, $instance->labelClass(''));
        $this->assertNotSame($instance, $instance->labelFor(''));
        $this->assertNotSame($instance, $instance->notLabel());
    }

    public function testNotLabel(): void
    {
        $instance = new class () {
            use HasLabelCollection;

            public function isLabel(): bool
            {
                return $this->isLabel;
            }
        };

        $this->assertTrue($instance->isLabel());
        $this->assertFalse($instance->notLabel()->isLabel());
    }

    public function testRenderLabelTag(): void
    {
        $instance = new class () extends AbstractButton {
            public function run(): string
            {
                return $this->renderLabelTag();
            }
        };

        $this->assertSame('<label>content</label>', $instance->label('content')->run());
    }

    public function testXSS(): void
    {
        $instance = new class () {
            use HasLabelCollection;

            public function getLabel(): string
            {
                return $this->label;
            }
        };

        $instance = $instance->label("<script>alert('Hack');</script>", Span::widget()->content('foo && bar'));

        $this->assertSame('<span>foo && bar</span>', $instance->getLabel());
    }
}
