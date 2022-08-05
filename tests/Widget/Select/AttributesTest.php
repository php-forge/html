<?php

declare(strict_types=1);

namespace Forge\Html\Widget\Select;

use Forge\Html\Widget\Select;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class AttributesTest extends TestCase
{
    private array $cities = [
        '1' => 'Moscu',
        '2' => 'San Petersburgo',
        '3' => 'Novosibirsk',
        '4' => 'Ekaterinburgo',
    ];

    /**
     * @throws ReflectionException
     */
    public function testDisabled(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <select id="propertytypeform-int" name="PropertyTypeForm[int]" disabled>
            <option value="1">Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::create()
                ->disabled()
                ->id('propertytypeform-int')
                ->items($this->cities)
                ->name('PropertyTypeForm[int]')
                ->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testForm(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <select id="propertytypeform-int" name="PropertyTypeForm[int]" form="test-form">
            <option value="1">Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::create()
                ->form('test-form')
                ->id('propertytypeform-int')
                ->items($this->cities)
                ->name('PropertyTypeForm[int]')
                ->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testMultiple(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <select id="propertytypeform-array" name="PropertyTypeForm[array]" multiple>
            <option value="1" selected>Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4" selected>Ekaterinburgo</option>
            </select>
            HTML,
            Select::create()
                ->id('propertytypeform-array')
                ->items($this->cities)
                ->multiple()
                ->name('PropertyTypeForm[array]')
                ->value(['1', '4'])
                ->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testRequired(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <select id="propertytypeform-array" name="PropertyTypeForm[array]" required>
            <option value="1">Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::create()
                ->id('propertytypeform-array')
                ->items($this->cities)
                ->name('PropertyTypeForm[array]')
                ->required()
                ->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testSizeWithMultiple(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <select id="propertytypeform-int" name="PropertyTypeForm[int]" multiple size="3">
            <option value="1" selected>Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::create()
                ->id('propertytypeform-int')
                ->items($this->cities)
                ->multiple()
                ->name('PropertyTypeForm[int]')
                ->size(3)
                ->value(1)
                ->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testValue(): void
    {
        $assert = new Assert();

        // Value int `1`.
        $assert->equalsWithoutLE(
            <<<HTML
            <select id="propertytypeform-int" name="PropertyTypeForm[int]">
            <option value="1" selected>Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::create()
                ->id('propertytypeform-int')
                ->items($this->cities)
                ->name('PropertyTypeForm[int]')
                ->value(1)
                ->render(),
        );

        // Value int `2`.
        $assert->equalsWithoutLE(
            <<<HTML
            <select id="propertytypeform-int" name="PropertyTypeForm[int]">
            <option value="1">Moscu</option>
            <option value="2" selected>San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::create()
                ->id('propertytypeform-int')
                ->items($this->cities)
                ->name('PropertyTypeForm[int]')
                ->value(2)
                ->render(),
        );

        // Value iterable `[2, 3]`.
        $assert->equalsWithoutLE(
            <<<HTML
            <select id="propertytypeform-array" name="PropertyTypeForm[array]">
            <option value="1">Moscu</option>
            <option value="2" selected>San Petersburgo</option>
            <option value="3" selected>Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::create()
                ->id('propertytypeform-array')
                ->items($this->cities)
                ->name('PropertyTypeForm[array]')
                ->value([2, 3])
                ->render(),
        );

        // Value string `1`.
        $assert->equalsWithoutLE(
            <<<HTML
            <select id="propertytypeform-string" name="PropertyTypeForm[string]">
            <option value="1" selected>Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::create()
                ->id('propertytypeform-string')
                ->items($this->cities)
                ->name('PropertyTypeForm[string]')
                ->value('1')
                ->render(),
        );

        // Value string `2`.
        $assert->equalsWithoutLE(
            <<<HTML
            <select id="propertytypeform-string" name="PropertyTypeForm[string]">
            <option value="1">Moscu</option>
            <option value="2" selected>San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::create()
                ->id('propertytypeform-string')
                ->items($this->cities)
                ->name('PropertyTypeForm[string]')
                ->value('2')
                ->render(),
        );

        // Value `null`.
        $assert->equalsWithoutLE(
            <<<HTML
            <select id="propertytypeform-int" name="PropertyTypeForm[int]">
            <option value="1">Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::create()
                ->id('propertytypeform-int')
                ->items($this->cities)
                ->name('PropertyTypeForm[int]')
                ->value(null)
                ->render(),
        );
    }
}
