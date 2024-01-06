<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasLabelItemClass;
use PHPUnit\Framework\TestCase;

final class HasLabelItemClassTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasLabelItemClass;
        };

        $this->assertNotSame($instance, $instance->labelItemClass(''));
    }
}
