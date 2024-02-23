<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasContainerSuffix;
use PHPUnit\Framework\TestCase;

final class HasContainerSuffixTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasContainerSuffix;
        };

        $this->assertNotSame($instance, $instance->containerSuffix(''));
    }
}
