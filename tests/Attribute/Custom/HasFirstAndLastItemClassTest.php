<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasFirstAndLastItemClass;
use PHPUnit\Framework\TestCase;

final class HHasFirstAndLastItemClassTest extends TestCase
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
