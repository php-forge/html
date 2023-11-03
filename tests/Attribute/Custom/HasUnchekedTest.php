<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasUnchecked;
use PHPUnit\Framework\TestCase;

final class HasUnchekedTest extends TestCase
{
    public function testAttributes(): void
    {
        $instance = new class () {
            use HasUnchecked;

            public function getUncheckAttributes(): array
            {
                return $this->uncheckAttributes;
            }
        };

        $instance = $instance->uncheckAttributes(['class' => 'foo']);
        $instance = $instance->uncheckAttributes(['disabled' => true]);

        $this->assertSame(['class' => 'foo', 'disabled' => true], $instance->getUncheckAttributes());
    }

    public function testClass(): void
    {
        $instance = new class () {
            use HasUnchecked;

            public function getClass(): string
            {
                return $this->uncheckAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getClass());

        $instance = $instance->uncheckClass('foo');

        $this->assertSame('foo', $instance->getClass());

        $instance = $instance->uncheckClass('bar');

        $this->assertSame('foo bar', $instance->getClass());
    }

    public function testImmutablity(): void
    {
        $instance = new class () {
            use HasUnchecked;
        };

        $this->assertNotSame($instance, $instance->uncheckAttributes([]));
        $this->assertNotSame($instance, $instance->uncheckClass(''));
        $this->assertNotSame($instance, $instance->uncheckValue(null));
    }
}
