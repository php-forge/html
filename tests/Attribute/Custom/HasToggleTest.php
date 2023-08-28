<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasToggle;
use PHPForge\Html\Span;
use PHPForge\Html\Svg;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

final class HasToggleTest extends TestCase
{
    public function testAttributes(): void
    {
        $instance = new class() {
            use HasToggle;

            public function getToggleAttributes(): array
            {
                return $this->toggleAttributes;
            }
        };

        $this->assertSame([], $instance->getToggleAttributes());

        $instance = $instance->toggleAttributes(['class' => 'test']);

        $this->assertSame(['class' => 'test'], $instance->getToggleAttributes());

        $instance = $instance->toggleAttributes(['disabled' => 'true']);

        $this->assertSame(['disabled' => 'true', 'class' => 'test'], $instance->getToggleAttributes());
    }

    public function testClass(): void
    {
        $instance = new class() {
            use HasToggle;

            public function getToggleAttributes(): array
            {
                return $this->toggleAttributes;
            }
        };

        $this->assertSame([], $instance->getToggleAttributes());

        $instance = $instance->toggleClass('test');

        $this->assertSame(['class' => 'test'], $instance->getToggleAttributes());

        $instance = $instance->toggleClass('test1');

        $this->assertSame(['class' => 'test test1'], $instance->getToggleAttributes());
    }

    public function testContent(): void
    {
        $instance = new class() {
            use HasToggle;

            public function getToggleContent(): string
            {
                return $this->toggleContent;
            }
        };

        $instance = $instance->toggleContent('foo && bar', Span::widget(), 'id');

        $this->assertSame('foo && bar<span></span>id', $instance->getToggleContent());
    }
    
    public function testExceptionDataAttributes(): void
    {
        $instance = new class() {
            use HasToggle;
        };

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'The data attribute `id` is not allowed. Allowed data attributes are: collapse-toggle, drawer-target, drawer-toggle, dropdown-toggle'
        );

        $instance->toggleDataAttribute('id', 'id');
    }

    public function testImmutablity(): void
    {
        $instance = new class() {
            use HasToggle;
        };

        $this->assertNotSame($instance, $instance->toggle(true));
        $this->assertNotSame($instance, $instance->toggleAttributes([]));
        $this->assertNotSame($instance, $instance->toggleClass(''));
        $this->assertNotSame($instance, $instance->toggleContent(''));
        $this->assertNotSame($instance, $instance->toggleDataAttribute('drawer-target', 'id'));
        $this->assertNotSame($instance, $instance->toggleId(''));
        $this->assertNotSame($instance, $instance->toggleOnClick(''));
        $this->assertNotSame($instance, $instance->toggleSvg(''));
        $this->assertNotSame($instance, $instance->toggletype(''));
    }

    public function testRender(): void
    {
        $instance = new class() {
            use HasToggle;

            public function getToggle(): bool
            {
                return $this->toggle;
            }
        };

        $this->assertTrue($instance->getToggle());
        $this->assertFalse($instance->toggle(false)->getToggle());
    }

    public function testSvg(): void
    {
        $instance = new class() {
            use HasToggle;

            public function getToggleSvg(): string
            {
                return $this->toggleSvg;
            }
        };

        $instance = $instance->toggleSvg(Svg::widget()->content('x'));

        Assert::equalsWithoutLE(
            <<<HTML
            <svg>
            x
            </svg>
            HTML,
            $instance->getToggleSvg(),
        );
    }

    public function testSvgWithString(): void
    {
        $instance = new class() {
            use HasToggle;

            public function getToggleSvg(): string
            {
                return $this->toggleSvg;
            }
        };

        $instance = $instance->toggleSvg('<svg>x</svg>');

        $this->assertSame('<svg>x</svg>', $instance->getToggleSvg());
    }

    public function testSvgWithXSS(): void
    {
        $instance = new class() {
            use HasToggle;

            public function getToggleSvg(): string
            {
                return $this->toggleSvg;
            }
        };

        $instance = $instance->toggleSvg('<svg><script>alert("xss")</script>x</svg>');

        $this->assertSame('<svg>x</svg>', $instance->getToggleSvg());
    }
}
