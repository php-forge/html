<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute;

use PHPForge\Html\Attribute\HasId;
use PHPUnit\Framework\TestCase;

final class HasIdTest extends TestCase
{
    public function testImmutablity(): void
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

        $instance = $instance->id(null);

        $this->assertNotEmpty($instance->generateId());
        $this->assertMatchesRegularExpression('/^id_[a-z0-9]{13}$/', $instance->generateId());
        $this->assertMatchesRegularExpression('/^alert_[a-z0-9]{13}$/', $instance->id(null)->generateId('alert_'));
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

    public function testGetId(): void
    {
        $instance = new class () {
            use HasId;

            protected array $attributes = [];
        };

        $this->assertSame('', $instance->id('')->getId());
        $this->assertSame('foo', $instance->id('foo')->getId());
    }
}
