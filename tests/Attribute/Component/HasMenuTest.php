<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Component;

use PHPForge\Html\Attribute\Component\HasMenu;
use PHPUnit\Framework\TestCase;

final class HasMenuTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasMenu;
        };

        $this->assertNotSame($instance, $instance->menu(''));
    }
}
