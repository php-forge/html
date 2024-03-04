<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Select;

use PHPForge\{Html\FormControl\Select, Support\Assert};
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class CustomMethodTest extends TestCase
{
    private array $cities = [
        1 => 'Moscu',
        2 => 'San Petersburgo',
        3 => 'Novosibirsk',
        4 => 'Ekaterinburgo',
    ];
    private array $citiesGroups = [
        1 => [
            2 => ' Moscu',
            3 => ' San Petersburgo',
            4 => ' Novosibirsk',
            5 => ' Ekaterinburgo',
        ],
        2 => [
            6 => 'Santiago',
            7 => 'Concepcion',
            8 => 'Chillan',
        ],
    ];
    private array $groups = [
        1 => [
            'label' => 'Russia',
        ],
        2 => [
            'label' => 'Chile',
        ],
    ];

    public function testFieldAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <select id="formmodelname-fieldname" name="formModelName[fieldName]">
            <option>Select an option</option>
            <option value="1">Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::widget()->fieldAttributes('formModelName', 'fieldName')->items($this->cities)->render()
        );
    }

    public function testGroups(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <select>
            <option>Select an option</option>
            <optgroup label="Russia">
            <option value="2"> Moscu</option>
            <option value="3"> San Petersburgo</option>
            <option value="4"> Novosibirsk</option>
            <option value="5"> Ekaterinburgo</option>
            </optgroup>
            <optgroup label="Chile">
            <option value="6">Santiago</option>
            <option value="7">Concepcion</option>
            <option value="8">Chillan</option>
            </optgroup>
            </select>
            HTML,
            Select::widget()->groups($this->groups)->items($this->citiesGroups)->render()
        );
    }

    public function testGroupsWithItemsAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <select>
            <option>Select an option</option>
            <optgroup label="Russia">
            <option value="2" disabled> Moscu</option>
            <option value="3"> San Petersburgo</option>
            <option value="4"> Novosibirsk</option>
            <option value="5"> Ekaterinburgo</option>
            </optgroup>
            <optgroup label="Chile">
            <option value="6">Santiago</option>
            <option value="7">Concepcion</option>
            <option value="8" selected>Chillan</option>
            </optgroup>
            </select>
            HTML,
            Select::widget()
                ->groups($this->groups)
                ->items($this->citiesGroups)
                ->itemsAttributes([2 => ['disabled' => true]])
                ->value(8)
                ->render()
        );
    }

    public function testItems(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <select>
            <option>Select an option</option>
            <option value="1">Moscu</option>
            </select>
            HTML,
            Select::widget()->items([1 => 'Moscu'])->render()
        );
    }

    public function testItemsAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <select>
            <option>Select an option</option>
            <option class="value" value="1">Moscu</option>
            </select>
            HTML,
            Select::widget()->items([1 => 'Moscu'])->itemsAttributes([1 => ['class' => 'value']])->render()
        );
    }

    public function testPrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            value
            </div>
            <select>
            <option>Select an option</option>
            <option value="1">Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::widget()->items($this->cities)->prefix('value')->render()
        );
    }

    public function testPrefixAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            value
            </div>
            <select>
            <option>Select an option</option>
            <option value="1">Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::widget()->items($this->cities)->prefix('value')->prefixAttributes(['class' => 'value'])->render()
        );
    }

    public function testPrefixClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            value
            </div>
            <select>
            <option>Select an option</option>
            <option value="1">Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::widget()->items($this->cities)->prefix('value')->prefixClass('value')->render()
        );
    }

    public function testPrefixTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span>value</span>
            <select>
            <option>Select an option</option>
            <option value="1">Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::widget()->items($this->cities)->prefix('value')->prefixTag('span')->render()
        );
    }

    public function testPrefixTagWithFalseValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            value
            <select>
            <option>Select an option</option>
            <option value="1">Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::widget()->items($this->cities)->prefix('value')->prefixTag(false)->render()
        );
    }

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <select>
            <option>Select an option</option>
            <option value="1">Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            <div>
            value
            </div>
            HTML,
            Select::widget()->items($this->cities)->suffix('value')->render()
        );
    }

    public function testSuffixAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <select>
            <option>Select an option</option>
            <option value="1">Moscu</option>
            </select>
            <div class="value">
            value
            </div>
            HTML,
            Select::widget()->items([1 => 'Moscu'])->suffix('value')->suffixAttributes(['class' => 'value'])->render()
        );
    }

    public function testSuffixClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <select>
            <option>Select an option</option>
            <option value="1">Moscu</option>
            </select>
            <div class="value">
            value
            </div>
            HTML,
            Select::widget()->items([1 => 'Moscu'])->suffix('value')->suffixClass('value')->render()
        );
    }

    public function testSuffixTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <select>
            <option>Select an option</option>
            <option value="1">Moscu</option>
            </select>
            <span>value</span>
            HTML,
            Select::widget()->items([1 => 'Moscu'])->suffix('value')->suffixTag('span')->render()
        );
    }

    public function testSuffixTagWithFalseValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <select>
            <option>Select an option</option>
            <option value="1">Moscu</option>
            </select>
            value
            HTML,
            Select::widget()->items([1 => 'Moscu'])->suffix('value')->suffixTag(false)->render()
        );
    }
}
