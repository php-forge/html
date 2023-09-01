<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Select;

use PHPForge\Html\Select;
use PHPForge\Html\Span;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class RenderTest extends TestCase
{
    private array $cities = [
        '1' => 'Moscu',
        '2' => 'San Petersburgo',
        '3' => 'Novosibirsk',
        '4' => 'Ekaterinburgo',
    ];
    private array $citiesGroups = [
        '1' => [
            '2' => ' Moscu',
            '3' => ' San Petersburgo',
            '4' => ' Novosibirsk',
            '5' => ' Ekaterinburgo',
        ],
        '2' => [
            '6' => 'Santiago',
            '7' => 'Concepcion',
            '8' => 'Chillan',
        ],
    ];
    private array $groups = [
        '1' => ['label' => 'Russia'],
        '2' => ['label' => 'Chile'],
    ];

    public function testElement(): void
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
            Select::widget()->items($this->cities)->render(),
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
            Select::widget()->groups($this->groups)->items($this->citiesGroups)->render(),
        );
    }

    public function testGroupsItemsAttributes(): void
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
                ->itemsAttributes(['2' => ['disabled' => true]])
                ->value(8)
                ->render(),
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <select id="test-id">
            <option>Select an option</option>
            <option value="1">Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::widget()->id('test-id')->items($this->cities)->render(),
        );
    }

    public function testItems(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <select>
            <option>Select an option</option>
            <option class="test-class" value="1">Moscu</option>
            </select>
            HTML,
            Select::widget()
                ->items([1 => 'Moscu'])
                ->itemsAttributes([1 => ['class' => 'test-class']])
                ->render(),
        );
    }

    public function testMultiple(): void
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
            Select::widget()->multiple()->items($this->cities)->value([1, 4])->render(),
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <select name="test-name">
            <option>Select an option</option>
            <option value="1">Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::widget()->name('test-name')->items($this->cities)->render(),
        );
    }

    public function testLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label>Cities:
            <select name="test-name">
            <option>Select an option</option>
            <option value="1">Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            </label>
            HTML,
            Select::widget()->name('test-name')->items($this->cities)->labelContent('Cities:')->render(),
        );
    }

    public function testPrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span>test-prefix</span>
            <select>
            <option>Select an option</option>
            <option value="1">Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::widget()->items($this->cities)->prefix(Span::widget()->content('test-prefix'))->render(),
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
            Select::widget()->items($this->cities)->prompt('Select City Birth')->render(),
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
            Select::widget()->items($this->cities)->prompt('Select City Birth', '0')->render(),
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
            <span>test-suffix</span>
            HTML,
            Select::widget()->items($this->cities)->suffix(Span::widget()->content('test-suffix'))->render(),
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
            Select::widget()->items($this->cities)->value(1)->render(),
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
            Select::widget()->items($this->cities)->value(2)->render(),
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
            Select::widget()->items($this->cities)->value([2, 3])->render(),
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
            Select::widget()->items($this->cities)->value('1')->render(),
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
            Select::widget()->items($this->cities)->value('2')->render(),
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
            Select::widget()->items($this->cities)->value(null)->render(),
        );
    }
}
