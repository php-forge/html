<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasToggle;
use PHPUnit\Framework\TestCase;
use Stringable;

final class HasToggleTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class () {
            use HasToggle;
        };

        $this->assertNotSame($instance, $instance->notToggle());
        $this->assertNotSame($instance, $instance->toggleAttributes([]));
        $this->assertNotSame($instance, $instance->toggleClass(''));
        $this->assertNotSame($instance, $instance->toggleContent(''));
        $this->assertNotSame($instance, $instance->toggleDataAttribute('id', ''));
        $this->assertNotSame($instance, $instance->toggleId(''));
        $this->assertNotSame($instance, $instance->toggleOnClick(''));
    }

    public function testNotToggle(): void
    {
        $instance = new class () {
            use HasToggle;

            public function getToggle(): bool
            {
                return $this->toggle;
            }
        };

        $this->assertTrue($instance->getToggle());
        $this->assertFalse($instance->notToggle()->getToggle());
    }

    public function testToggleAttributes(): void
    {
        $instance = new class () {
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

    public function testToggleClass(): void
    {
        $instance = new class () {
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

    public function testToggleContent(): void
    {
        $instance = new class () {
            use HasToggle;

            public function getToggleContent(): string
            {
                return $this->toggleContent;
            }
        };

        $this->assertEmpty($instance->getToggleContent());
        $this->assertSame('foo', $instance->toggleContent('foo')->getToggleContent());
        $this->assertSame('&lt;foo &amp;&amp; bar&gt;', $instance->toggleContent('<foo && bar>')->getToggleContent());
    }

    public function testToggleContentSpecialChar(): void
    {
        $instance = new class () {
            use HasToggle;

            public function getToggleContent(): string
            {
                return $this->toggleContent;
            }
        };

        $toggle = new class () implements Stringable {
            public function __toString(): string
            {
                return 'bar && baz';
            }
        };

        $this->assertEmpty($instance->getToggleContent());
        $this->assertSame('bar && baz', $instance->toggleContent($toggle)->getToggleContent());
    }

    public function testToggleContentStringable(): void
    {
        $instance = new class () {
            use HasToggle;

            public function getToggleContent(): string
            {
                return $this->toggleContent;
            }
        };

        $this->assertSame('', $instance->getToggleContent());

        $toggle = new class () implements Stringable {
            public function __toString(): string
            {
                return 'test';
            }
        };

        $this->assertSame('test', $instance->toggleContent($toggle)->getToggleContent());
    }
}