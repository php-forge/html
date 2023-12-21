<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Input;

use PHPForge\Html\Attribute\Input\HasMinLength;
use PHPUnit\Framework\TestCase;

final class HasMinLengthTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasMinLength;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->minlength(0));
    }
}
