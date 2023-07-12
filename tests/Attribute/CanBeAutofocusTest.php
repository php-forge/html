<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Tag;

use PHPForge\Html\Attribute\CanBeAutofocus;
use PHPUnit\Framework\TestCase;

final class CanBeAutofocusTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class () {
            use CanBeAutofocus;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->autofocus());
    }

    public function testRender(): void
    {
        $instance = new class () {
            use CanBeAutofocus;

            protected array $attributes = [];

            public function getAutofocus(): bool
            {
                return $this->attributes['autofocus'] ?? false;
            }
        };

        $this->assertFalse($instance->getAutofocus());
        $this->assertTrue($instance->autofocus()->getAutofocus());
    }
}
