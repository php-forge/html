<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Input;

use InvalidArgumentException;
use PHPForge\Html\Attribute\Input\HasAutocomplete;
use PHPUnit\Framework\TestCase;

final class HasAutocompleteTest extends TestCase
{
    public function testException(): void
    {
        $instance = new class() {
            use HasAutocomplete;

            protected array $attributes = [];
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Autocomplete must be "on" or "off".');

        $instance->autocomplete('');
    }

    public function testImmutablity(): void
    {
        $instance = new class() {
            use HasAutocomplete;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->autocomplete('on'));
    }

    public function testRender(): void
    {
        $instance = new class() {
            use HasAutocomplete;

            protected array $attributes = [];

            public function getAttributes(): array
            {
                return $this->attributes;
            }
        };

        $instance = $instance->autocomplete('off');

        $this->assertSame([ 'autocomplete' => 'off'], $instance->getAttributes());

        $instance = $instance->autocomplete('on');

        $this->assertSame([ 'autocomplete' => 'on'], $instance->getAttributes());
    }
}
