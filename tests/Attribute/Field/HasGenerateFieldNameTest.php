<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Field;

use PHPForge\Html\Attribute\Field\HasGenerateField;
use PHPUnit\Framework\TestCase;

final class HasGenerateFieldNameTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasGenerateField;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->generateField('ModelName', 'fieldName', true));
    }
}
