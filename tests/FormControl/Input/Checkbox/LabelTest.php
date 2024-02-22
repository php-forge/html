<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Checkbox;

use PHPForge\Html\FormControl\Input\Checkbox;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class LabelTest extends TestCase
{
    public function testEnclosedByLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label for="checkbox-6582f2d099e8b">
            <input id="checkbox-6582f2d099e8b" type="checkbox">
            Red
            </label>
            HTML,
            Checkbox::widget()->enclosedByLabel(true)->id('checkbox-6582f2d099e8b')->label('Red')->render()
        );
    }

    public function testEnclosedByLabelWithLabelContentEmpty(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="checkbox-6582f2d099e8b" type="checkbox">
            HTML,
            Checkbox::widget()->enclosedByLabel(true)->id('checkbox-6582f2d099e8b')->render()
        );
    }

    public function testEnclosedByLabelWithLabelFor(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label for="label-for">
            <input id="checkbox-6582f2d099e8b" type="checkbox">
            Red
            </label>
            HTML,
            Checkbox::widget()
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
            <input id="checkbox-6582f2d099e8b" type="checkbox">
            <label for="checkbox-6582f2d099e8b">Red</label>
            HTML,
            Checkbox::widget()->id('checkbox-6582f2d099e8b')->label('Red')->render()
        );
    }

    public function testLabelAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="checkbox-6582f2d099e8b" type="checkbox">
            <label class="value" for="checkbox-6582f2d099e8b">Red</label>
            HTML,
            Checkbox::widget()
                ->id('checkbox-6582f2d099e8b')
                ->label('Red')
                ->labelAttributes(['class' => 'value'])
                ->render()
        );
    }

    public function testLabelClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="checkbox-6582f2d099e8b" type="checkbox">
            <label class="value" for="checkbox-6582f2d099e8b">Red</label>
            HTML,
            Checkbox::widget()->id('checkbox-6582f2d099e8b')->label('Red')->labelClass('value')->render()
        );
    }

    public function testLabelFor(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="checkbox-6582f2d099e8b" type="checkbox">
            <label for="value">Red</label>
            HTML,
            Checkbox::widget()->id('checkbox-6582f2d099e8b')->label('Red')->labelFor('value')->render()
        );
    }

    public function testNotLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="checkbox-6582f2d099e8b" type="checkbox">
            HTML,
            Checkbox::widget()->id('checkbox-6582f2d099e8b')->label('Red')->notLabel()->render()
        );
    }
}
