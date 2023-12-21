<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Input;

use InvalidArgumentException;
use PHPForge\Html\Attribute\Input\HasFormaction;
use PHPUnit\Framework\TestCase;

final class HasFormactionTest extends TestCase
{
    public function testException(): void
    {
        $instance = new class () {
            use HasFormaction;

            protected array $attributes = [];
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The formaction attribute must be empty.');

        $instance->formaction('');
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasFormaction;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->formaction('index'));
    }
}
