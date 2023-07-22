<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Input;

use PHPForge\Html\Attribute\Input\HasAccept;
use PHPUnit\Framework\TestCase;

final class HasAcceptTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class() {
            use HasAccept;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->accept(''));
    }
}
