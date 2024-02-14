<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\Button;

use PHPForge\Html\Input\Button;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class LabelTest extends TestCase
{
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
                ->labelAttributes(['class' => 'value'])
                ->labelContent('Label')
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
                ->labelClass('value')
                ->labelContent('Label')
                ->render()
        );
    }

    public function testLabelContent(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <label for="button-6582f2d099e8b">Label</label>
            <input id="button-6582f2d099e8b" type="button">
            </div>
            HTML,
            Button::widget()->id('button-6582f2d099e8b')->labelContent('Label')->render()
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
                ->labelContent('Label')
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
            Button::widget()->id('button-6582f2d099e8b')->labelContent('Label')->notLabel()->render()
        );
    }
}
