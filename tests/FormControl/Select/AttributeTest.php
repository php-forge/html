<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Select;

use PHPForge\{Html\FormControl\Select, Support\Assert};

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class AttributeTest extends \PHPUnit\Framework\TestCase
{
    private array $cities = [
        1 => 'Moscu',
        2 => 'San Petersburgo',
        3 => 'Novosibirsk',
        4 => 'Ekaterinburgo',
    ];

    public function testAriaLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <select aria-label="value">
            <option>Select an option</option>
            <option value="1">Moscu</option>
            </select>
            HTML,
            Select::widget()->items([1 => 'Moscu'])->ariaLabel('value')->render()
        );
    }

    public function testAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <select class="value">
            <option>Select an option</option>
            <option value="1">Moscu</option>
            </select>
            HTML,
            Select::widget()->attributes(['class' => 'value'])->items([1 => 'Moscu'])->render()
        );
    }

    public function testAutocomplete(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <select autocomplete="on">
            <option>Select an option</option>
            <option value="1">Moscu</option>
            </select>
            HTML,
            Select::widget()->autocomplete('on')->items([1 => 'Moscu'])->render()
        );
    }

    public function testAutofocus(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <select autofocus>
            <option>Select an option</option>
            <option value="1">Moscu</option>
            </select>
            HTML,
            Select::widget()->items([1 => 'Moscu'])->autofocus()->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <select class="value">
            <option>Select an option</option>
            <option value="1">Moscu</option>
            </select>
            HTML,
            Select::widget()->items([1 => 'Moscu'])->class('value')->render()
        );
    }

    public function testDisabled(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <select disabled>
            <option>Select an option</option>
            <option value="1">Moscu</option>
            </select>
            HTML,
            Select::widget()->items([1 => 'Moscu'])->disabled()->render()
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <select id="value">
            <option>Select an option</option>
            <option value="1">Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::widget()->id('value')->items($this->cities)->render(),
        );
    }

    public function testMultipleWithValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <select multiple>
            <option>Select an option</option>
            <option value="1" selected>Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4" selected>Ekaterinburgo</option>
            </select>
            HTML,
            Select::widget()->multiple()->items($this->cities)->value([1, 4])->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <select name="value">
            <option>Select an option</option>
            <option value="1">Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::widget()->name('value')->items($this->cities)->render()
        );
    }

    public function testPrompt(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <select>
            <option>Select City Birth</option>
            <option value="1">Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::widget()->items($this->cities)->prompt('Select City Birth')->render()
        );

        Assert::equalsWithoutLE(
            <<<HTML
            <select>
            <option value="0">Select City Birth</option>
            <option value="1">Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::widget()->items($this->cities)->prompt('Select City Birth', '0')->render()
        );
    }

    public function testRequired(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <select required>
            <option>Select an option</option>
            <option value="1">Moscu</option>
            </select>
            HTML,
            Select::widget()->items([1 => 'Moscu'])->required()->render()
        );
    }

    public function testSize(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <select size="4">
            <option>Select an option</option>
            <option value="1">Moscu</option>
            </select>
            HTML,
            Select::widget()->items([1 => 'Moscu'])->size(4)->render()
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <select style="value">
            <option>Select an option</option>
            <option value="1">Moscu</option>
            </select>
            HTML,
            Select::widget()->items([1 => 'Moscu'])->style('value')->render()
        );
    }

    public function testTabIndex(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <select tabindex="1">
            <option>Select an option</option>
            <option value="1">Moscu</option>
            </select>
            HTML,
            Select::widget()->items([1 => 'Moscu'])->tabIndex(1)->render()
        );
    }

    public function testValue(): void
    {
        // Value int `1`.
        Assert::equalsWithoutLE(
            <<<HTML
            <select>
            <option>Select an option</option>
            <option value="1" selected>Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::widget()->items($this->cities)->value(1)->render()
        );

        // Value int `2`.
        Assert::equalsWithoutLE(
            <<<HTML
            <select>
            <option>Select an option</option>
            <option value="1">Moscu</option>
            <option value="2" selected>San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::widget()->items($this->cities)->value(2)->render()
        );

        // Value iterable `[2, 3]`.
        Assert::equalsWithoutLE(
            <<<HTML
            <select>
            <option>Select an option</option>
            <option value="1">Moscu</option>
            <option value="2" selected>San Petersburgo</option>
            <option value="3" selected>Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::widget()->items($this->cities)->value([2, 3])->render()
        );

        // Value string `1`.
        Assert::equalsWithoutLE(
            <<<HTML
            <select>
            <option>Select an option</option>
            <option value="1" selected>Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::widget()->items($this->cities)->value('1')->render()
        );

        // Value string `2`.
        Assert::equalsWithoutLE(
            <<<HTML
            <select>
            <option>Select an option</option>
            <option value="1">Moscu</option>
            <option value="2" selected>San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::widget()->items($this->cities)->value('2')->render()
        );

        // Value `null`.
        Assert::equalsWithoutLE(
            <<<HTML
            <select>
            <option>Select an option</option>
            <option value="1">Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::widget()->items($this->cities)->value(null)->render()
        );
    }

    public function testWithoutId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <select name="FormModelName[property]">
            <option>Select an option</option>
            <option value="1">Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::widget()->fieldAttributes('FormModelName', 'property')->id(null)->items($this->cities)->render()
        );
    }

    public function testWithoutName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <select id="formmodelname-property">
            <option>Select an option</option>
            <option value="1">Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::widget()->items($this->cities)->fieldAttributes('FormModelName', 'property')->name(null)->render()
        );
    }
}
