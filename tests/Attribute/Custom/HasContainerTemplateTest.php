<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasContainerTemplate;
use PHPUnit\Framework\TestCase;

final class HasContainerTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasContainerTemplate;
        };

        $this->assertNotSame($instance, $instance->containerTemplate(''));
    }
}
