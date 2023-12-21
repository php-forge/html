<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Input;

use PHPForge\Html\Attribute\Input\HasPattern;
use PHPUnit\Framework\TestCase;

final class HasPatternTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasPattern;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->pattern(''));
    }
}
