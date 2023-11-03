<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Component;

use PHPForge\Html\Attribute\Component\HasDisabledClass;
use PHPUnit\Framework\TestCase;

final class HasDisabledClassTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class () {
            use HasDisabledClass;
        };

        $this->assertNotSame($instance, $instance->disabledClass(''));
    }
}
