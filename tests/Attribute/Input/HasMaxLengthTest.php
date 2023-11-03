<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Input;

use PHPForge\Html\Attribute\Input\HasMaxLength;
use PHPUnit\Framework\TestCase;

final class HasMaxLengthTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class () {
            use HasMaxLength;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->maxlength(1));
    }
}
