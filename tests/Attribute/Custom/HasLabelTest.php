<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasLabel;
use PHPUnit\Framework\TestCase;

final class HasLabelTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class () {
            use HasLabel;
        };

        $this->assertNotSame($instance, $instance->label(''));
        $this->assertNotSame($instance, $instance->labelAttributes([]));
        $this->assertNotSame($instance, $instance->labelClass(''));
        $this->assertNotSame($instance, $instance->labelFor(''));
        $this->assertNotSame($instance, $instance->notLabel());
    }

    public function testLabelClass(): void
    {
        $instance = new class () {
            use HasLabel;

            public function getLabelClass(): string
            {
                return $this->labelAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getLabelClass());

        $instance = $instance->labelClass('foo');

        $this->assertSame('foo', $instance->getLabelClass());

        $instance = $instance->labelClass('bar');

        $this->assertSame('foo bar', $instance->getLabelClass());
    }
}
