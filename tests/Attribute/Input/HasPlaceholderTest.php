<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Input;

use PHPForge\Html\Attribute\Input\HasPlaceholder;
use PHPUnit\Framework\TestCase;

final class HasPlaceholderTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class() {
            use HasPlaceholder;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->placeholder(''));
    }
}
