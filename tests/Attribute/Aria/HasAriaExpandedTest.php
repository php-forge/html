<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Aria;

use PHPForge\Html\Attribute\Aria\HasAriaExpanded;
use PHPUnit\Framework\TestCase;

final class HasAriaExpandedTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasAriaExpanded;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->ariaExpanded(''));
    }
}
