<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Tag;

use InvalidArgumentException;
use PHPForge\Html\Attribute\Tag\HasLoading;
use PHPUnit\Framework\TestCase;

final class HasLoadingTest extends TestCase
{
    public function testException(): void
    {
        $instance = new class() {
            use HasLoading;

            protected array $attributes = [];
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The loading attribute value must be one of "eager", "lazy".');

        $instance->loading('');
    }

    public function testImmutablity(): void
    {
        $instance = new class() {
            use HasLoading;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->loading('eager'));
    }
}
