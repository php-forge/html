<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Component;

use InvalidArgumentException;
use PHPForge\Html\Attribute\Component\HasToggle;
use PHPForge\Html\Span;
use PHPUnit\Framework\TestCase;

final class HasToggleTest extends TestCase
{
    public function testAttributes(): void
    {
        $instance = new class () {
            use HasToggle;

            public function getToggleAttributes(): array
            {
                return $this->toggleAttributes;
            }
        };

        $this->assertSame([], $instance->getToggleAttributes());

        $instance = $instance->toggleAttributes(['class' => 'class']);

        $this->assertSame(['class' => 'class'], $instance->getToggleAttributes());

        $instance = $instance->toggleAttributes(['disabled' => 'true']);

        $this->assertSame(['disabled' => 'true', 'class' => 'class'], $instance->getToggleAttributes());
    }

    public function testClass(): void
    {
        $instance = new class () {
            use HasToggle;

            public function getToggleClass(): string
            {
                return $this->toggleClass;
            }

            public function getToggleClassOverride(): bool
            {
                return $this->toggleClassOverride;
            }
        };

        $this->assertEmpty($instance->getToggleClass());
        $this->assertFalse($instance->getToggleClassOverride());

        $instance = $instance->toggleClass('class', true);

        $this->assertSame('class', $instance->getToggleClass());
    }

    public function testContent(): void
    {
        $instance = new class () {
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
        $instance = new class () {
            use HasToggle;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'The data attribute `id` is not allowed. Allowed data attributes are: bs-toggle, bs-target, collapse-toggle, drawer-target, drawer-toggle, dropdown-toggle'
        );

        $instance->toggleDataAttribute('id', 'id');
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasToggle;
        };

        $this->assertNotSame($instance, $instance->toggle(true));
        $this->assertNotSame($instance, $instance->toggleAttributes([]));
        $this->assertNotSame($instance, $instance->toggleClass(''));
        $this->assertNotSame($instance, $instance->toggleContent(''));
        $this->assertNotSame($instance, $instance->toggleDataAttribute('drawer-target', 'id'));
        $this->assertNotSame($instance, $instance->toggleId(''));
        $this->assertNotSame($instance, $instance->toggleTag('span'));
    }

    public function testRender(): void
    {
        $instance = new class () {
            use HasToggle;

            protected bool $toggle = true;

            public function getToggle(): bool
            {
                return $this->toggle;
            }
        };

        $this->assertTrue($instance->getToggle());
        $this->assertFalse($instance->toggle(false)->getToggle());
    }

    public function testTag(): void
    {
        $instance = new class () {
            use HasToggle;

            protected string $toggleTag = 'span';

            public function getToggleTag(): string
            {
                return $this->toggleTag;
            }
        };

        $this->assertSame('span', $instance->getToggleTag());

        $instance = $instance->toggleTag('div');

        $this->assertSame('div', $instance->getToggleTag());
    }

    public function testTagException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The toggle tag must be a non-empty string.');

        $instance = new class () {
            use HasToggle;

            protected string $toggleTag = 'span';
        };

        $instance->toggleTag('');
    }
}
