<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Tests\Tag\Select;

use Forge\Html\Tag\Select;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class SelectTest extends TestCase
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

    /**
     * @throws ReflectionException
     */
    public function testGroups(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <select id="propertytypeform-int" name="PropertyTypeForm[int]">
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
            Select::create()
                ->groups($this->groups)
                ->id('propertytypeform-int')
                ->items($this->citiesGroups)
                ->name('PropertyTypeForm[int]')
                ->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testGroupsItemsAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <select id="propertytypeform-int" name="PropertyTypeForm[int]">
            <optgroup label="Russia">
            <option value="2" disabled> Moscu</option>
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
            Select::create()
                ->groups($this->groups)
                ->id('propertytypeform-int')
                ->items($this->citiesGroups)
                ->itemsAttributes(['2' => ['disabled' => true]])
                ->name('PropertyTypeForm[int]')
                ->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testItems(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <select id="propertytypeform-int" name="PropertyTypeForm[int]">
            <option class="test-class" value="1">Moscu</option>
            </select>
            HTML,
            Select::create()
                ->id('propertytypeform-int')
                ->items([1 => 'Moscu'])
                ->itemsAttributes([1 => ['class' => 'test-class']])
                ->name('PropertyTypeForm[int]')
                ->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testPrompt(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <select id="propertytypeform-int" name="PropertyTypeForm[int]">
            <option>Select City Birth</option>
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
                ->prompt('Select City Birth')
                ->render(),
        );

        Assert::equalsWithoutLE(
            <<<HTML
            <select id="propertytypeform-int" name="PropertyTypeForm[int]">
            <option value="0">Select City Birth</option>
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
                ->prompt('Select City Birth', '0')
                ->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testRender(): void
    {
        Assert::equalsWithoutLE(
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
                ->render(),
        );
    }
}
