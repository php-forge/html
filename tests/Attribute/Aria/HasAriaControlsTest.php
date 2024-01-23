<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Aria;

use PHPForge\Html\Attribute\Aria\HasAriaControls;
use PHPUnit\Framework\TestCase;

final class HasAriaControlsTest extends TestCase
{
    public function testGenerateAriaControls(): void
    {
        $instance = new class () {
            use HasAriaControls;

            public array $attributes = [];

            public function getAriaControls(): bool|string
            {
                return $this->ariaControls;
            }
        };

        $this->assertFalse($instance->getAriaControls());
        $this->assertEmpty($instance->attributes);

        $instance = $instance->ariaControls(true);

        $this->assertTrue($instance->getAriaControls());
        $this->assertEmpty($instance->attributes);

        $instance = $instance->ariaControls('aria-controls');

        $this->assertFalse($instance->getAriaControls());
        $this->assertSame([
            'aria-controls' => 'aria-controls',
        ], $instance->attributes);
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasAriaControls;
        };

        $this->assertNotSame($instance, $instance->ariaControls(''));
    }
}
