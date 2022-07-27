<?php

declare(strict_types=1);

namespace Forge\Html\Tests\Helper;

use Forge\Html\Helper\Attribute;
use PHPUnit\Framework\TestCase;

final class AttributeTest extends TestCase
{
    public function testAdd(): void
    {
        $attributes = [];

        // Add a new attribute `disabled` with value `''`.
        Attribute::add($attributes, 'disabled', '');
        $this->assertSame([], $attributes);

        // Add a new attribute `disabled` with value `[]`.
        Attribute::add($attributes, 'disabled', []);
        $this->assertSame([], $attributes);

        // Add a new attribute `disabled` with value `true`.
        Attribute::add($attributes, 'disabled', true);
        $this->assertSame(['disabled' => true], $attributes);

        // Add a new attribute `disabled` with value `[false]`.
        Attribute::add($attributes, 'disabled', [false]);
        $this->assertSame(['disabled' => false], $attributes);

        // Add a new attribute `disabled` with value `[true]`.
        Attribute::add($attributes, 'disabled', [true]);
        $this->assertSame(['disabled' => true], $attributes);

        // Add a new attribute `disabled` with value `[false, true]`.
        Attribute::add($attributes, 'disabled', [false, true]);
        $this->assertSame(['disabled' => false], $attributes);

        // Add a new attribute `required` with value `true`.
        Attribute::add($attributes, 'required', true);
        $this->assertSame(['disabled' => false, 'required' => true], $attributes);

        // Add a new attribute `required` with value `[false]`.
        Attribute::add($attributes, 'required', [false]);
        $this->assertSame(['disabled' => false, 'required' => false], $attributes);

        // Add a new attribute `required` with value `[true, false]`.
        Attribute::add($attributes, 'required', [false]);
        $this->assertSame(['disabled' => false, 'required' => false], $attributes);

        // Add a new attribute `tabindex` with value `1`.
        Attribute::add($attributes, 'tabindex', 1);
        $this->assertSame(['disabled' => false, 'required' => false, 'tabindex' => 1], $attributes);

        // Add a new attribute `required` with value `[true]`.
        Attribute::add($attributes, 'required', [true]);
        $this->assertSame(['disabled' => false, 'required' => true, 'tabindex' => 1], $attributes);
    }
}
