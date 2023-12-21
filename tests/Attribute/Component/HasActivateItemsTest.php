<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Component;

use PHPForge\Html\Attribute\Component\HasActivateItems;
use PHPUnit\Framework\TestCase;

final class HasActivateItemsTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasActivateItems;
        };

        $this->assertNotSame($instance, $instance->activateItems(true));
    }
}
