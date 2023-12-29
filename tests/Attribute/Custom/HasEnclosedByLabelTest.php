<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasEnclosedByLabel;
use PHPUnit\Framework\TestCase;

final class HasEnclosedByLabelTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasEnclosedByLabel;
        };

        $this->assertNotSame($instance, $instance->enclosedByLabel());
    }
}
