<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasTemplate;
use PHPUnit\Framework\TestCase;

final class HasTemplateTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasTemplate;
        };

        $this->assertNotSame($instance, $instance->template(''));
        $this->assertNotSame($instance, $instance->tokenValue('', ''));
    }
}
