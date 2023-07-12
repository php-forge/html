<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Input;

use PHPForge\Html\Attribute\Input\HasName;
use PHPUnit\Framework\TestCase;

final class HasNameTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class () {
            use HasName;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->name(''));
    }
}
