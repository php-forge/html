<?php

declare(strict_types=1);

namespace Forge\Html\Tests\Helper;

use Forge\Html\Helper\Attribute;
use InvalidArgumentException;
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

    public function dataGetInputName(): array
    {
        return [
            ['', 'age', 'age'],
            ['', 'dates[0]', 'dates[0]'],
            ['Login', '[0]content', 'Login[0][content]'],
            ['Login', '[0]dates[0]', 'Login[0][dates][0]'],
            ['Login', 'age', 'Login[age]'],
            ['Login', 'báz', 'Login[báz]'],
            ['Login', 'dates[0]', 'Login[dates][0]'],
        ];
    }

    /**
     * @dataProvider dataGetInputName
     *
     * @param string $formModelName The form model name.
     * @param string $attribute The attribute name.
     * @param string $expected The expected input name.
     */
    public function testGetInputName(string $formModelName, string $attribute, string $expected): void
    {
        $this->assertSame($expected, Attribute::getInputName($formModelName, $attribute));
    }

    public function testGetInputNameExceptionAttributeNoValid(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Attribute name must contain word characters only.');
        Attribute::getInputName('Login', '*username');
    }

    public function testGetInputNameExceptionForTabularInputs(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The form name cannot be empty for tabular inputs.');
        Attribute::getInputName('', '[0]dates[0]');
    }
}
