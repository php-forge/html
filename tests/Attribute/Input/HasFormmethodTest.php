<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Input;

use InvalidArgumentException;
use PHPForge\Html\Attribute\Input\HasFormmethod;
use PHPUnit\Framework\TestCase;

final class HasFormmethodTest extends TestCase
{
    public function testException(): void
    {
        $instance = new class() {
            use HasFormmethod;

            protected array $attributes = [];
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The formnMethod attribute must be either "get" or "post".');

        $instance->formmethod('');
    }

    public function testImmutablity(): void
    {
        $instance = new class() {
            use HasFormmethod;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->formmethod('get'));
    }
}
