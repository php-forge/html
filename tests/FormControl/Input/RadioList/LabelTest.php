<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\RadioList;

use PHPForge\Html\FormControl\Input\{Radio, RadioList};
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
            <div id="radiolist-65858c272ea89">
            <label for="radio-6599b6a33dd96"><input id="radio-6599b6a33dd96" name="radioform[text]" type="radio" value="1">Female</label>
            <label for="radio-6599b6a33dd97"><input id="radio-6599b6a33dd97" name="radioform[text]" type="radio" value="2">Male</label>
            </div>
            HTML,
            RadioList::widget()
                ->enclosedByLabel(true)
                ->id('radiolist-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->label('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->label('Male')->value(2),
                )
                ->name('radioform[text]')
                ->render(),
        );
    }

    public function testLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label for="radiolist-65858c272ea89">Select your gender?</label>
            <div id="radiolist-65858c272ea89">
            <input id="radio-6599b6a33dd96" name="radioform[text]" type="radio" value="1">
            <label for="radio-6599b6a33dd96">Female</label>
            <input id="radio-6599b6a33dd97" name="radioform[text]" type="radio" value="2">
            <label for="radio-6599b6a33dd97">Male</label>
            </div>
            HTML,
            RadioList::widget()
                ->id('radiolist-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->label('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->label('Male')->value(2),
                )
                ->label('Select your gender?')
                ->name('radioform[text]')
                ->render(),
        );
    }

    public function testLabelAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label class="value" for="radiolist-65858c272ea89">Select your gender?</label>
            <div id="radiolist-65858c272ea89">
            <input id="radio-6599b6a33dd96" name="radioform[text]" type="radio" value="1">
            <label for="radio-6599b6a33dd96">Female</label>
            <input id="radio-6599b6a33dd97" name="radioform[text]" type="radio" value="2">
            <label for="radio-6599b6a33dd97">Male</label>
            </div>
            HTML,
            RadioList::widget()
                ->id('radiolist-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->label('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->label('Male')->value(2),
                )
                ->labelAttributes(['class' => 'value'])
                ->label('Select your gender?')
                ->name('radioform[text]')
                ->render(),
        );
    }

    public function testLabelClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label class="value" for="radiolist-65858c272ea89">Select your gender?</label>
            <div id="radiolist-65858c272ea89">
            <input id="radio-6599b6a33dd96" name="radioform[text]" type="radio" value="1">
            <label for="radio-6599b6a33dd96">Female</label>
            <input id="radio-6599b6a33dd97" name="radioform[text]" type="radio" value="2">
            <label for="radio-6599b6a33dd97">Male</label>
            </div>
            HTML,
            RadioList::widget()
                ->id('radiolist-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->label('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->label('Male')->value(2),
                )
                ->label('Select your gender?')
                ->labelClass('value')
                ->name('radioform[text]')
                ->render(),
        );
    }

    public function testLabelItemClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label for="radiolist-65858c272ea89">Select your gender?</label>
            <div id="radiolist-65858c272ea89">
            <input id="radio-6599b6a33dd96" name="CheckboxForm[text]" type="radio" value="1">
            <label class="value" for="radio-6599b6a33dd96">Female</label>
            <input id="radio-6599b6a33dd97" name="CheckboxForm[text]" type="radio" value="2">
            <label class="value" for="radio-6599b6a33dd97">Male</label>
            </div>
            HTML,
            RadioList::widget()
                ->id('radiolist-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->label('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->label('Male')->value(2),
                )
                ->label('Select your gender?')
                ->labelItemClass('value')
                ->name('CheckboxForm[text]')
                ->render(),
        );
    }

    public function testNotLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="radiolist-65858c272ea89">
            <input id="radio-6599b6a33dd96" name="radioform[text]" type="radio" value="1">
            <label for="radio-6599b6a33dd96">Female</label>
            <input id="radio-6599b6a33dd97" name="radioform[text]" type="radio" value="2">
            <label for="radio-6599b6a33dd97">Male</label>
            </div>
            HTML,
            RadioList::widget()
                ->id('radiolist-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->label('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->label('Male')->value(2),
                )
                ->label('Select your gender?')
                ->name('radioform[text]')
                ->notLabel()
                ->render(),
        );
    }
}
