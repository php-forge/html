<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Component;

use PHPForge\Html\Attribute\Component\HasLinkAttributes;
use PHPUnit\Framework\TestCase;

final class HasLinkAttributesTest extends TestCase
{
    public function testAttributes(): void
    {
        $instance = new class () {
            use HasLinkAttributes;

            public function getLinkAttributes(): array
            {
                return $this->linkAttributes;
            }
        };

        $instance = $instance->linkAttributes(['class' => 'value']);
        $instance = $instance->linkAttributes(['disabled' => true]);

        $this->assertSame(['class' => 'value', 'disabled' => true], $instance->getLinkAttributes());
    }

    public function testClass(): void
    {
        $instance = new class () {
            use HasLinkAttributes;

            public function getLinkClass(): string
            {
                return $this->linkAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getLinkClass());

        $instance = $instance->linkClass('class');

        $this->assertSame('class', $instance->getLinkClass());

        $instance = $instance->linkClass('class-1');

        $this->assertSame('class class-1', $instance->getLinkClass());

        $instance = $instance->linkClass('override-class', true);

        $this->assertSame('override-class', $instance->getLinkClass());
    }

    public function testGetLinkAttributes(): void
    {
        $instance = new class () {
            use HasLinkAttributes;
        };

        $this->assertSame(
            ['class' => 'value'],
            $instance->linkAttributes(['class' => 'value'])->getLinkAttributes()
        );
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasLinkAttributes;
        };

        $this->assertNotSame($instance, $instance->linkAttributes([]));
        $this->assertNotSame($instance, $instance->linkClass(''));
    }
}
