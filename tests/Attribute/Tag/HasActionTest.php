<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Tag;

use PHPForge\Html\Attribute\Tag\HasAction;
use PHPUnit\Framework\TestCase;

final class HasActionTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class() {
            use HasAction;
        };

        $this->assertNotSame($instance, $instance->action(''));
    }
}
