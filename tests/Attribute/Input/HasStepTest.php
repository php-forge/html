<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Input;

use InvalidArgumentException;
use PHPForge\Html\Attribute\Input\HasStep;
use PHPUnit\Framework\TestCase;

final class HasStepTest extends TestCase
{
    public function testException(): void
    {
        $instance = new class () {
            use HasStep;

            protected array $attributes = [];
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The value must be a number.');

        $instance->step('');
    }

    public function testImmutablity(): void
    {
        $instance = new class () {
            use HasStep;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->step(1));
    }
}
