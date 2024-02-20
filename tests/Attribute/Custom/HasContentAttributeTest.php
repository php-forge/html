<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasContentAttribute;
use PHPUnit\Framework\TestCase;

final class HasContentAttributeTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasContentAttribute;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->content(''));
    }
}
