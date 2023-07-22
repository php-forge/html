<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Tag;

use PHPForge\Html\Attribute\Tag\HasPrompt;
use PHPUnit\Framework\TestCase;

final class HasPromptTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class() {
            use HasPrompt;
        };

        $this->assertNotSame($instance, $instance->prompt(''));
    }

    public function testRender(): void
    {
        $instance = new class() {
            use HasPrompt;

            public function getPrompt(): string
            {
                return $this->prompt;
            }
        };

        $this->assertSame('<option value="1">option 1</option>', $instance->prompt('option 1', '1')->getPrompt());
    }
}
