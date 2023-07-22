<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Input;

use PHPForge\Html\Attribute\Input\HasAlt;
use PHPUnit\Framework\TestCase;

final class HasAltTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class() {
            use HasAlt;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->alt(''));
    }
}
