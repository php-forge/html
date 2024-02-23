<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Button;

use PHPForge\{Html\FormControl\Input\Button, Support\Assert};
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class LabelTest extends TestCase
{
    public function testLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <label for="button-6582f2d099e8b">Label</label>
            <input id="button-6582f2d099e8b" type="button">
            </div>
            HTML,
            Button::widget()->id('button-6582f2d099e8b')->label('Label')->render()
        );
    }

    public function testLabelAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <label class="value" for="button-6582f2d099e8b">Label</label>
            <input id="button-6582f2d099e8b" type="button">
            </div>
            HTML,
            Button::widget()
                ->id('button-6582f2d099e8b')
                ->label('Label')
                ->labelAttributes(['class' => 'value'])
                ->render()
        );
    }

    public function testLabelClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <label class="value" for="button-6582f2d099e8b">Label</label>
            <input id="button-6582f2d099e8b" type="button">
            </div>
            HTML,
            Button::widget()
                ->id('button-6582f2d099e8b')
                ->label('Label')
                ->labelClass('value')
                ->render()
        );
    }

    public function testLabelFor(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <label for="label-for">Label</label>
            <input id="button-6582f2d099e8b" type="button">
            </div>
            HTML,
            Button::widget()
                ->id('button-6582f2d099e8b')
                ->label('Label')
                ->LabelFor('label-for')
                ->render()
        );
    }

    public function testNotLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="button-6582f2d099e8b" type="button">
            </div>
            HTML,
            Button::widget()->id('button-6582f2d099e8b')->label('Label')->notLabel()->render()
        );
    }
}
