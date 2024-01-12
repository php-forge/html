<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute;

use PHPForge\Html\Attribute\HasId;
use PHPUnit\Framework\TestCase;

final class HasIdTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasId;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->id(''));
    }

    public function testGenerateId(): void
    {
        $instance = new class () {
            use HasId;

            protected array $attributes = [];
        };

        $instance = $instance->id('');

        $this->assertNotEmpty($instance->generateId());
        $this->assertMatchesRegularExpression('/^id_[a-z0-9]{13}$/', $instance->generateId());
        $this->assertMatchesRegularExpression('/^alert_[a-z0-9]{13}$/', $instance->id('')->generateId('alert_'));
    }

    public function testGenerateIdWithId(): void
    {
        $instance = new class () {
            use HasId;

            protected array $attributes = [];
        };


        $instance = $instance->id('foo');

        $this->assertSame('foo', $instance->generateId());
    }
}
