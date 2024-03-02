<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Select;

use PHPForge\{Html\FormControl\Select, Support\Assert};

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class LabelTest extends \PHPUnit\Framework\TestCase
{

    private array $cities = [
        1 => 'Moscu',
        2 => 'San Petersburgo',
        3 => 'Novosibirsk',
        4 => 'Ekaterinburgo',
    ];

    public function testDisableLabel(): void
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
            Select::widget()->disableLabel()->items($this->cities)->label('Cities:')->render()
        );
    }

    public function testLabel(): void
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
            Select::widget()->items($this->cities)->label('Cities:')->render()
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
                ->label('Cities:')
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
            Select::widget()->items($this->cities)->labelClass('value')->label('Cities:')->render()
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
            Select::widget()->id('value')->items($this->cities)->label('Cities:')->labelFor('value')->render()
        );
    }
}
