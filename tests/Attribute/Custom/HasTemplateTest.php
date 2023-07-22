<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasTemplate;
use PHPUnit\Framework\TestCase;

final class HasTemplateTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class() {
            use HasTemplate;

            protected string $template = '{input}';
        };

        $this->assertNotSame($instance, $instance->template(''));
    }
}
