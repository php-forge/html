<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Component;

use PHPForge\Html\Attribute\Component\HasLastItemClass;
use PHPUnit\Framework\TestCase;

final class HasLastItemClassTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasLastItemClass;
        };

        $this->assertNotSame($instance, $instance->lastItemClass(''));
    }
}
