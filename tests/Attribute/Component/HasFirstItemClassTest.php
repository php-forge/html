<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Component;

use PHPForge\Html\Attribute\Component\HasFirstItemClass;
use PHPUnit\Framework\TestCase;

final class HasFirstItemClassTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasFirstItemClass;
        };

        $this->assertNotSame($instance, $instance->firstItemClass(''));
    }
}
