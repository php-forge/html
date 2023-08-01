<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasActiveClass;
use PHPUnit\Framework\TestCase;

final class HasActiveClassTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class() {
            use HasActiveClass;
        };

        $this->assertNotSame($instance, $instance->activeClass(''));
    }
}
