<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Input;

use PHPForge\Html\Attribute\Input\HasSize;
use PHPUnit\Framework\TestCase;

final class HasSizeTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class () {
            use HasSize;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->size(0));
    }
}
