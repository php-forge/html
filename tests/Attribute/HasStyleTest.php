<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Tag;

use PHPForge\Html\Attribute\HasStyle;
use PHPUnit\Framework\TestCase;

final class HasStyleTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class () {
            use HasStyle;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->style(''));
    }
}
