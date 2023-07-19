<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Input;

use InvalidArgumentException;
use PHPForge\Html\Attribute\Input\HasFormtarget;
use PHPUnit\Framework\TestCase;

final class HasFormtargetTest extends TestCase
{
    public function testException(): void
    {
        $instance = new class () {
            use HasFormtarget;

            protected array $attributes = [];
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'The formtarget attribute value must be one of "_blank", "_self", "_parent" or "_top"',
        );

        $instance->formtarget('');
    }

    public function testImmutablity(): void
    {
        $instance = new class () {
            use HasFormtarget;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->formtarget('_blank'));
    }
}
