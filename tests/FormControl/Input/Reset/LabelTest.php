<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Reset;

use PHPForge\{Html\FormControl\Input\Reset, Support\Assert};
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
            <label for="reset-6582f2d099e8b">Label</label>
            <input id="reset-6582f2d099e8b" type="reset">
            </div>
            HTML,
            Reset::widget()->id('reset-6582f2d099e8b')->label('Label')->render()
        );
    }

    public function testLabelAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <label class="value" for="reset-6582f2d099e8b">Label</label>
            <input id="reset-6582f2d099e8b" type="reset">
            </div>
            HTML,
            Reset::widget()->id('reset-6582f2d099e8b')->label('Label')->labelAttributes(['class' => 'value'])->render()
        );
    }

    public function testLabelClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <label class="value" for="reset-6582f2d099e8b">Label</label>
            <input id="reset-6582f2d099e8b" type="reset">
            </div>
            HTML,
            Reset::widget()->id('reset-6582f2d099e8b')->label('Label')->labelClass('value')->render()
        );
    }

    public function testLabelFor(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <label for="label-for">Label</label>
            <input id="reset-6582f2d099e8b" type="reset">
            </div>
            HTML,
            Reset::widget()
                ->id('reset-6582f2d099e8b')->label('Label')->LabelFor('label-for')->render()
        );
    }

    public function testNotLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="reset-6582f2d099e8b" type="reset">
            </div>
            HTML,
            Reset::widget()->id('reset-6582f2d099e8b')->label('Label')->notLabel()->render()
        );
    }
}
