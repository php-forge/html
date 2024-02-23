<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasUncheckedCollection;
use PHPUnit\Framework\TestCase;

final class HasUnchekedCollectionTest extends TestCase
{
    public function testAttributes(): void
    {
        $instance = new class () {
            use HasUncheckedCollection;

            public function getUncheckAttributes(): array
            {
                return $this->uncheckAttributes;
            }
        };

        $instance = $instance->uncheckAttributes([
            'class' => 'foo',
        ]);
        $instance = $instance->uncheckAttributes([
            'disabled' => true,
        ]);

        $this->assertSame([
            'class' => 'foo',
            'disabled' => true,
        ], $instance->getUncheckAttributes());
    }

    public function testClass(): void
    {
        $instance = new class () {
            use HasUncheckedCollection;

            public function getClass(): string
            {
                return $this->uncheckAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getClass());

        $instance = $instance->uncheckClass('class');

        $this->assertSame('class', $instance->getClass());

        $instance = $instance->uncheckClass('class-1');

        $this->assertSame('class class-1', $instance->getClass());

        $instance = $instance->uncheckClass('override-class', true);

        $this->assertSame('override-class', $instance->getClass());
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasUncheckedCollection;
        };

        $this->assertNotSame($instance, $instance->uncheckAttributes([]));
        $this->assertNotSame($instance, $instance->uncheckClass(''));
        $this->assertNotSame($instance, $instance->uncheckValue(null));
    }
}
