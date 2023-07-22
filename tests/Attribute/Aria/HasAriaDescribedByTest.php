<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Aria;

use PHPForge\Html\Attribute\Aria\HasAriaDescribedBy;
use PHPUnit\Framework\TestCase;

final class HasAriaDescribedByTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class() {
            use HasAriaDescribedBy;
        };

        $this->assertNotSame($instance, $instance->ariaDescribedBy(''));
    }
}
