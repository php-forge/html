<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute;

use PHPForge\Html\Attribute\HasLang;
use PHPUnit\Framework\TestCase;

final class HasLangTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasLang;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->lang(''));
    }
}
