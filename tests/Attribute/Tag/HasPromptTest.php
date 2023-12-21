<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Tag;

use PHPForge\Html\Attribute\Tag\HasPrompt;
use PHPUnit\Framework\TestCase;

final class HasPromptTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasPrompt;
        };

        $this->assertNotSame($instance, $instance->prompt(''));
    }
}
