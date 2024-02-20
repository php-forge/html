<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Select;

use PHPForge\Html\FormControl\Select;
use PHPForge\Support\Assert;
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

    public function testGenerateField(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <select id="modelname-fieldname" name="ModelName[fieldName]">
            <option>Select an option</option>
            <option value="1">Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::widget()->generateField('ModelName', 'fieldName')->items($this->cities)->render()
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

    public function testLabelAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label class="value">Cities:
            <select>
            <option>Select an option</option>
            <option value="1">Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            </label>
            HTML,
            Select::widget()
                ->items($this->cities)
                ->labelAttributes(['class' => 'value'])
                ->labelContent('Cities:')
                ->render()
        );
    }

    public function testLabelClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label class="value">Cities:
            <select>
            <option>Select an option</option>
            <option value="1">Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            </label>
            HTML,
            Select::widget()->items($this->cities)->labelClass('value')->labelContent('Cities:')->render()
        );
    }

    public function testLabelContent(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label>Cities:
            <select>
            <option>Select an option</option>
            <option value="1">Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            </label>
            HTML,
            Select::widget()->items($this->cities)->labelContent('Cities:')->render()
        );
    }

    public function testLabelFor(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label for="value">Cities:
            <select id="value">
            <option>Select an option</option>
            <option value="1">Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            </label>
            HTML,
            Select::widget()->id('value')->items($this->cities)->labelContent('Cities:')->labelFor('value')->render()
        );
    }

    public function testNotLabel(): void
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
            HTML,
            Select::widget()->items($this->cities)->labelContent('Cities:')->notLabel()->render()
        );
    }

    public function testPrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            prefix
            <select>
            <option>Select an option</option>
            <option value="1">Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::widget()->items($this->cities)->prefix('prefix')->render()
        );
    }

    public function testPrefixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            prefix
            </div>
            <select>
            <option>Select an option</option>
            <option value="1">Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::widget()->items($this->cities)->prefixContainer(true)->prefix('prefix')->render()
        );
    }

    public function testPrefixContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            prefix
            </div>
            <select>
            <option>Select an option</option>
            <option value="1">Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::widget()
                ->items($this->cities)
                ->prefixContainer(true)
                ->prefix('prefix')
                ->prefixContainerClass('value')
                ->render()
        );
    }

    public function testPrefixContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span>prefix</span>
            <select>
            <option>Select an option</option>
            <option value="1">Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::widget()
                ->items($this->cities)
                ->prefixContainer(true)
                ->prefix('prefix')
                ->prefixContainerTag('span')
                ->render()
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
            value
            HTML,
            Select::widget()->items($this->cities)->suffix('value')->render()
        );
    }

    public function testSuffixContainer(): void
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
            Select::widget()->items($this->cities)->suffixContainer(true)->suffix('value')->render()
        );
    }

    public function testSuffixContainerAttributes(): void
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
            Select::widget()
                ->items([1 => 'Moscu'])
                ->suffixContainer(true)
                ->suffix('value')
                ->suffixContainerAttributes(['class' => 'value'])
                ->render()
        );
    }

    public function testSuffixContainerClass(): void
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
            Select::widget()
                ->items([1 => 'Moscu'])
                ->suffixContainer(true)
                ->suffix('value')
                ->suffixContainerClass('value')
                ->render()
        );
    }

    public function testSuffixContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <select>
            <option>Select an option</option>
            <option value="1">Moscu</option>
            </select>
            <span>value</span>
            HTML,
            Select::widget()
                ->items([1 => 'Moscu'])
                ->suffixContainer(true)
                ->suffix('value')
                ->suffixContainerTag('span')
                ->render()
        );
    }
}
