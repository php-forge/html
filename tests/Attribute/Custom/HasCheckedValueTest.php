<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasCheckedValue;
use PHPUnit\Framework\TestCase;

final class HasCheckedValueTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasCheckedValue;
        };

        $this->assertNotSame($instance, $instance->checkedValue(null));
    }
}
