<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Tag;

use InvalidArgumentException;
use PHPForge\Html\Attribute\Tag\HasReferrerpolicy;
use PHPUnit\Framework\TestCase;

final class HasReferrerpolicyTest extends TestCase
{
    public function testEmptyValue(): void
    {
        $instance = new class () {
            use HasReferrerpolicy;

            protected array $attributes = [];
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'The value must not be empty. The valid values are: "no-referrer", "no-referrer-when-downgrade", "origin", "origin-when-cross-origin", "same-origin", "strict-origin", "strict-origin-when-cross-origin", "unsafe-url".'
        );

        $instance->referrerpolicy('');
    }

    public function testInvalidValue(): void
    {
        $instance = new class () {
            use HasReferrerpolicy;

            protected array $attributes = [];
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'Invalid value "value" for the referrerpolicy attribute. Allowed values are: "no-referrer", "no-referrer-when-downgrade", "origin", "origin-when-cross-origin", "same-origin", "strict-origin", "strict-origin-when-cross-origin", "unsafe-url".'
        );

        $instance->referrerpolicy('value');
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasReferrerpolicy;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->referrerpolicy('no-referrer'));
        $this->assertNotSame($instance, $instance->referrerpolicy('no-referrer-when-downgrade'));
        $this->assertNotSame($instance, $instance->referrerpolicy('origin'));
        $this->assertNotSame($instance, $instance->referrerpolicy('origin-when-cross-origin'));
        $this->assertNotSame($instance, $instance->referrerpolicy('same-origin'));
        $this->assertNotSame($instance, $instance->referrerpolicy('strict-origin'));
        $this->assertNotSame($instance, $instance->referrerpolicy('strict-origin-when-cross-origin'));
        $this->assertNotSame($instance, $instance->referrerpolicy('unsafe-url'));
    }
}
