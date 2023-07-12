<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Input;

use PHPForge\Html\Attribute\Input\HasHeight;
use PHPUnit\Framework\TestCase;

final class HasHeightTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class {
            use HasHeight;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->height(0));
    }
}
