<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\RadioList;

use PHPForge\{Html\FormControl\Input\Radio, Html\FormControl\Input\RadioList, Support\Assert};
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class AttributeTest extends TestCase
{
    public function testAriaDescribedBy(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="radiolist-65858c272ea89">
            <input id="radio-6599b6a33dd96" name="radioform[text]" type="radio" value="1" aria-describedby="value">
            <label for="radio-6599b6a33dd96">Female</label>
            <input id="radio-6599b6a33dd97" name="radioform[text]" type="radio" value="2" aria-describedby="value">
            <label for="radio-6599b6a33dd97">Male</label>
            </div>
            HTML,
            RadioList::widget()
                ->ariaDescribedBy('value')
                ->id('radiolist-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->label('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->label('Male')->value(2),
                )
                ->name('radioform[text]')
                ->render()
        );
    }

    public function testAriaLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="radiolist-65858c272ea89">
            <input id="radio-6599b6a33dd96" name="radioform[text]" type="radio" value="1" aria-label="value">
            <label for="radio-6599b6a33dd96">Female</label>
            <input id="radio-6599b6a33dd97" name="radioform[text]" type="radio" value="2" aria-label="value">
            <label for="radio-6599b6a33dd97">Male</label>
            </div>
            HTML,
            RadioList::widget()
                ->ariaLabel('value')
                ->id('radiolist-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->label('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->label('Male')->value(2),
                )
                ->name('radioform[text]')
                ->render()
        );
    }

    public function testAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="radiolist-65858c272ea89">
            <input class="value" id="radio-6599b6a33dd96" name="radioform[text]" type="radio" value="1">
            <label for="radio-6599b6a33dd96">Female</label>
            <input class="value" id="radio-6599b6a33dd97" name="radioform[text]" type="radio" value="2">
            <label for="radio-6599b6a33dd97">Male</label>
            </div>
            HTML,
            RadioList::widget()
                ->attributes(['class' => 'value'])
                ->id('radiolist-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->label('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->label('Male')->value(2),
                )
                ->name('radioform[text]')
                ->render()
        );
    }

    public function testAutofocus(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="radiolist-65858c272ea89" autofocus>
            <input id="radio-6599b6a33dd96" name="radioform[text]" type="radio" value="1">
            <label for="radio-6599b6a33dd96">Female</label>
            <input id="radio-6599b6a33dd97" name="radioform[text]" type="radio" value="2">
            <label for="radio-6599b6a33dd97">Male</label>
            </div>
            HTML,
            RadioList::widget()
                ->autofocus()
                ->id('radiolist-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->label('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->label('Male')->value(2),
                )
                ->name('radioform[text]')
                ->render()
        );
    }

    public function testChecked(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="radiolist-65858c272ea89">
            <input id="radio-6599b6a33dd96" name="radioform[text]" type="radio" value="1">
            <label for="radio-6599b6a33dd96">Female</label>
            <input id="radio-6599b6a33dd97" name="radioform[text]" type="radio" value="2" checked>
            <label for="radio-6599b6a33dd97">Male</label>
            </div>
            HTML,
            RadioList::widget()
                ->checked(2)
                ->id('radiolist-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->label('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->label('Male')->value(2),
                )
                ->name('radioform[text]')
                ->render()
        );
    }

    public function testCheckedWithNull(): void
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
                ->checked(null)
                ->id('radiolist-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->label('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->label('Male')->value(2),
                )
                ->name('radioform[text]')
                ->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="radiolist-65858c272ea89">
            <input class="value" id="radio-6599b6a33dd96" name="radioform[text]" type="radio" value="1">
            <label for="radio-6599b6a33dd96">Female</label>
            <input class="value" id="radio-6599b6a33dd97" name="radioform[text]" type="radio" value="2">
            <label for="radio-6599b6a33dd97">Male</label>
            </div>
            HTML,
            RadioList::widget()
                ->class('value')
                ->id('radiolist-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->label('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->label('Male')->value(2),
                )
                ->name('radioform[text]')
                ->render()
        );
    }

    public function testGenerateAriaDescribedBy(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="radiolist-65858c272ea89">
            <input id="radio-6599b6a33dd96" name="radioform[text]" type="radio" value="1" aria-describedby="radiolist-65858c272ea89-help">
            <label for="radio-6599b6a33dd96">Female</label>
            <input id="radio-6599b6a33dd97" name="radioform[text]" type="radio" value="2" aria-describedby="radiolist-65858c272ea89-help">
            <label for="radio-6599b6a33dd97">Male</label>
            </div>
            HTML,
            RadioList::widget()
                ->ariaDescribedBy()
                ->id('radiolist-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->label('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->label('Male')->value(2),
                )
                ->name('radioform[text]')
                ->render()
        );
    }

    public function testGenerateAriaDescribedByWithFalse(): void
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
                ->ariaDescribedBy(false)
                ->id('radiolist-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->label('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->label('Male')->value(2),
                )
                ->name('radioform[text]')
                ->render()
        );
    }

    public function testGenerateId(): void
    {
        $this->assertStringContainsString('id="radiolist-', RadioList::widget()->render());
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="value">
            <input id="id-radio-1" name="radioform[text]" type="radio" value="1">
            <label for="id-radio-1">Female</label>
            <input id="id-radio-2" name="radioform[text]" type="radio" value="2">
            <label for="id-radio-2">Male</label>
            </div>
            HTML,
            RadioList::widget()
                ->id('value')
                ->items(
                    Radio::widget()->id('id-radio-1')->label('Female')->value(1),
                    Radio::widget()->id('id-radio-2')->label('Male')->value(2),
                )
                ->name('radioform[text]')
                ->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label for="radiolist-65858c272ea89">Select your gender?</label>
            <div id="radiolist-65858c272ea89">
            <input id="radio-6599b6a33dd96" name="value" type="radio" value="1">
            <label for="radio-6599b6a33dd96">Female</label>
            <input id="radio-6599b6a33dd97" name="value" type="radio" value="2">
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
                ->name('value')
                ->render()
        );
    }

    public function testTabindex(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="radiolist-65858c272ea89" tabindex="1">
            <input id="radio-6599b6a33dd96" name="radioform[text]" type="radio" value="red">
            <label for="radio-6599b6a33dd96">Red</label>
            <input id="radio-6599b6a33dd97" name="radioform[text]" type="radio" value="blue">
            <label for="radio-6599b6a33dd97">Blue</label>
            </div>
            HTML,
            RadioList::widget()
                ->id('radiolist-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->label('Red')->value('red'),
                    Radio::widget()->id('radio-6599b6a33dd97')->label('Blue')->value('blue'),
                )
                ->name('radioform[text]')
                ->tabIndex(1)
                ->render()
        );
    }

    public function testValue(): void
    {
        // bool value
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="radiolist-65858c272ea89">
            <input id="radio-6599b6a33dd96" name="radioform[text]" type="radio" value="0" checked>
            <label for="radio-6599b6a33dd96">inactive</label>
            <input id="radio-6599b6a33dd97" name="radioform[text]" type="radio" value="1">
            <label for="radio-6599b6a33dd97">active</label>
            </div>
            HTML,
            RadioList::widget()
                ->checked(false)
                ->id('radiolist-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->label('inactive')->value(false),
                    Radio::widget()->id('radio-6599b6a33dd97')->label('active')->value(true),
                )
                ->name('radioform[text]')
                ->render()
        );

        // int value
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="radiolist-65858c272ea89">
            <input id="radio-6599b6a33dd96" name="radioform[text]" type="radio" value="1" checked>
            <label for="radio-6599b6a33dd96">Female</label>
            <input id="radio-6599b6a33dd97" name="radioform[text]" type="radio" value="2">
            <label for="radio-6599b6a33dd97">Male</label>
            </div>
            HTML,
            RadioList::widget()
                ->checked(1)
                ->id('radiolist-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->label('Female')->value('1'),
                    Radio::widget()->id('radio-6599b6a33dd97')->label('Male')->value('2'),
                )
                ->name('radioform[text]')
                ->render()
        );

        // string value
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="radiolist-65858c272ea89">
            <input id="radio-6599b6a33dd96" name="radioform[text]" type="radio" value="red" checked>
            <label for="radio-6599b6a33dd96">Red</label>
            <input id="radio-6599b6a33dd97" name="radioform[text]" type="radio" value="blue">
            <label for="radio-6599b6a33dd97">Blue</label>
            </div>
            HTML,
            RadioList::widget()
                ->checked('red')
                ->id('radiolist-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->label('Red')->value('red'),
                    Radio::widget()->id('radio-6599b6a33dd97')->label('Blue')->value('blue'),
                )
                ->name('radioform[text]')
                ->render()
        );
    }

    public function testValueWithNull(): void
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
                ->checked(null)
                ->id('radiolist-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->label('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->label('Male')->value(2),
                )
                ->name('radioform[text]')
                ->render()
        );
    }

    public function testWithoutId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input name="radioform[text]" type="radio" value="1">
            <label>Female</label>
            <input name="radioform[text]" type="radio" value="2">
            <label>Male</label>
            </div>
            HTML,
            RadioList::widget()
                ->generateField('ModelName', 'fieldName')
                ->id(null)
                ->items(
                    Radio::widget()->label('Female')->value(1),
                    Radio::widget()->label('Male')->value(2),
                )
                ->name('radioform[text]')
                ->render()
        );
    }

    public function testWithoutName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="radiolist-65858c272ea89">
            <input id="modelname-fieldname" type="radio" value="1">
            <label for="modelname-fieldname">Female</label>
            <input id="modelname-fieldname" type="radio" value="2">
            <label for="modelname-fieldname">Male</label>
            </div>
            HTML,
            RadioList::widget()
                ->generateField('ModelName', 'fieldName')
                ->id('radiolist-65858c272ea89')
                ->items(
                    Radio::widget()->label('Female')->value(1),
                    Radio::widget()->label('Male')->value(2),
                )
                ->name(null)
                ->render()
        );
    }
}
