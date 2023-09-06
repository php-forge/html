<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Component;

use PHPForge\Html\Attribute\Component\HasFirstAndLastItemClass;
use PHPUnit\Framework\TestCase;

final class HasFirstAndLastItemClassTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class() {
            use HasFirstAndLastItemClass;
        };

        $this->assertNotSame($instance, $instance->firstItemClass(''));
        $this->assertNotSame($instance, $instance->lastItemClass(''));
    }
}
