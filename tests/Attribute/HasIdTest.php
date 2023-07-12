<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute;

use PHPForge\Html\Attribute\HasId;
use PHPUnit\Framework\TestCase;

final class HasIdTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class () {
            use HasId;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->id(''));
    }
}
