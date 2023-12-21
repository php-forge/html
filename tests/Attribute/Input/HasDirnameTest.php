<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Input;

use InvalidArgumentException;
use PHPForge\Html\Attribute\Input\HasDirname;
use PHPUnit\Framework\TestCase;

final class HasDirnameTest extends TestCase
{
    public function testException(): void
    {
        $instance = new class () {
            use HasDirname;

            protected array $attributes = [];
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The value cannot be empty.');

        $instance->dirname('');
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasDirname;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->dirname('test'));
    }
}
