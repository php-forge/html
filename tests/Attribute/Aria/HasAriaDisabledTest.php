<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Aria;

use PHPForge\Html\Attribute\Aria\HasAriaDisabled;
use PHPUnit\Framework\TestCase;

final class HasAriaDisabledTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasAriaDisabled;
        };

        $this->assertNotSame($instance, $instance->ariaDisabled(''));
    }
}
