<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Radio;

use PHPForge\{Html\FormControl\Input\Radio, Support\Assert};
use PHPUnit\Framework\TestCase;

final class LabelTest extends TestCase
{
    public function testEnclosedByLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label for="radio-6582f2d099e8b">
            <input id="radio-6582f2d099e8b" type="radio">
            Red
            </label>
            HTML,
            Radio::widget()->enclosedByLabel(true)->id('radio-6582f2d099e8b')->label('Red')->render()
        );
    }

    public function testEnclosedByLabelWithLabelContentEmpty(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio">
            HTML,
            Radio::widget()->enclosedByLabel(true)->id('radio-6582f2d099e8b')->render()
        );
    }

    public function testEnclosedByLabelWithLabelFor(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label for="label-for">
            <input id="checkbox-6582f2d099e8b" type="radio">
            Red
            </label>
            HTML,
            Radio::widget()
                ->enclosedByLabel(true)
                ->id('checkbox-6582f2d099e8b')
                ->label('Red')
                ->labelFor('label-for')
                ->render()
        );
    }

    public function testLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio">
            <label for="radio-6582f2d099e8b">Active</label>
            HTML,
            Radio::widget()->id('radio-6582f2d099e8b')->label('Active')->render()
        );
    }

    public function testLabelAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio">
            <label class="class" for="radio-6582f2d099e8b">Active</label>
            HTML,
            Radio::widget()
                ->id('radio-6582f2d099e8b')
                ->label('Active')
                ->labelAttributes(['class' => 'class'])
                ->render()
        );
    }

    public function testLabelClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio">
            <label class="class" for="radio-6582f2d099e8b">Active</label>
            HTML,
            Radio::widget()->id('radio-6582f2d099e8b')->label('Active')->labelClass('class')->render()
        );
    }

    public function testLabelFor(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="checkbox-6582f2d099e8b" type="radio">
            <label for="label-for">Red</label>
            HTML,
            Radio::widget()->id('checkbox-6582f2d099e8b')->label('Red')->labelFor('label-for')->render()
        );
    }

    public function testNotLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio">
            HTML,
            Radio::widget()->id('radio-6582f2d099e8b')->label('Red')->notLabel()->render()
        );
    }
}
