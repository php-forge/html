<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Input;

use InvalidArgumentException;
use PHPForge\Html\Attribute\Input\HasFormenctype;
use PHPUnit\Framework\TestCase;

final class HasFormenctypeTest extends TestCase
{
    public function testException(): void
    {
        $instance = new class () {
            use HasFormenctype;

            protected array $attributes = [];
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'The formenctype attribute must be one of the following values: ' .
            '"multipart/form-data", "application/x-www-form-urlencoded", "text/plain".',
        );

        $instance->formenctype('');
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasFormenctype;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->formenctype('text/plain'));
    }

    public function testRender(): void
    {
        $instance = new class () {
            use HasFormenctype;

            protected array $attributes = [];

            public function getFormenctype(): string
            {
                return $this->attributes['formenctype'] ?? '';
            }
        };

        $this->assertSame('', $instance->getFormenctype());
        $this->assertSame(
            'application/x-www-form-urlencoded',
            $instance->formenctype('application/x-www-form-urlencoded')->getFormenctype(),
        );
        $this->assertSame(
            'multipart/form-data',
            $instance->formenctype('multipart/form-data')->getFormenctype(),
        );
        $this->assertSame(
            'text/plain',
            $instance->formenctype('text/plain')->getFormenctype(),
        );
    }
}
