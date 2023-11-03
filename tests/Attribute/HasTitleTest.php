<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute;

use PHPForge\Html\Attribute\HasTitle;
use PHPUnit\Framework\TestCase;

final class HasTitleTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class () {
            use HasTitle;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->title(''));
    }
}
