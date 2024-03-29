<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Input;

use PHPForge\Html\Attribute\Input\HasForm;
use PHPUnit\Framework\TestCase;

final class HasFormTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasForm;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->form(''));
    }
}
