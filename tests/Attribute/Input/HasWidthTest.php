<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Input;

use PHPForge\Html\Attribute\Input\HasWidth;
use PHPUnit\Framework\TestCase;

final class HasWidthTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class {
            use HasWidth;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->width(0));
    }
}
