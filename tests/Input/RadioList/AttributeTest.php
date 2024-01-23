<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\RadioList;

use PHPForge\Html\Input\Radio;
use PHPForge\Html\Input\RadioList;
use PHPForge\Support\Assert;
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
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Male')->value(2),
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
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Male')->value(2),
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
                ->attributes([
                    'class' => 'value',
                ])
                ->id('radiolist-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Male')->value(2),
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
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->name('radioform[text]')
                ->render()
        );
    }

    public function testCheckedValue(): void
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
                ->checkedValue(2)
                ->id('radiolist-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->name('radioform[text]')
                ->render()
        );
    }

    public function testCheckedValueWithNull(): void
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
                ->checkedValue(null)
                ->id('radiolist-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Male')->value(2),
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
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Male')->value(2),
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
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Male')->value(2),
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
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->name('radioform[text]')
                ->render()
        );
    }

    public function testGenerateId(): void
    {
        $this->assertStringContainsString('id="radiolist-', RadioList::widget()->render());
    }

    public function testGetValue(): void
    {
        $this->assertSame('value', RadioList::widget()->value('value')->getValue());
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
                    Radio::widget()->id('id-radio-1')->labelContent('Female')->value(1),
                    Radio::widget()->id('id-radio-2')->labelContent('Male')->value(2),
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
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->labelContent('Select your gender?')
                ->name('value')
                ->render()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="radiolist-65858c272ea89">
            <input id="radio-6599b6a33dd96" name="radioform[text]" type="radio" value="red">
            <label for="radio-6599b6a33dd96">Red</label>
            <input id="radio-6599b6a33dd97" name="radioform[text]" type="radio" value="blue">
            <label for="radio-6599b6a33dd97">Blue</label>
            </div>
            HTML,
            RadioList::widget()
                ->id('radiolist-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Red')->value('red'),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Blue')->value('blue'),
                )
                ->name('radioform[text]')
                ->render()
        );
    }

    public function testRequired(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="radiolist-65858c272ea89">
            <input id="radio-6599b6a33dd96" name="radioform[text]" type="radio" value="red" required>
            <label for="radio-6599b6a33dd96">Red</label>
            <input id="radio-6599b6a33dd97" name="radioform[text]" type="radio" value="blue" required>
            <label for="radio-6599b6a33dd97">Blue</label>
            </div>
            HTML,
            RadioList::widget()
                ->id('radiolist-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Red')->value('red'),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Blue')->value('blue'),
                )
                ->name('radioform[text]')
                ->required()
                ->render()
        );
    }

    public function testSeparator(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="radiolist-65858c272ea89">
            <input id="radio-6599b6a33dd96" name="radioform[text]" type="radio" value="red">
            <label for="radio-6599b6a33dd96">Red</label>
            <input id="radio-6599b6a33dd97" name="radioform[text]" type="radio" value="blue">
            <label for="radio-6599b6a33dd97">Blue</label>
            </div>
            HTML,
            RadioList::widget()
                ->id('radiolist-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Red')->value('red'),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Blue')->value('blue'),
                )
                ->name('radioform[text]')
                ->separator(PHP_EOL)
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
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Red')->value('red'),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Blue')->value('blue'),
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
                ->checkedValue(false)
                ->id('radiolist-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('inactive')->value(false),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('active')->value(true),
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
                ->checkedValue(1)
                ->id('radiolist-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Female')->value('1'),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Male')->value('2'),
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
                ->checkedValue('red')
                ->id('radiolist-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Red')->value('red'),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Blue')->value('blue'),
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
                ->checkedValue(null)
                ->id('radiolist-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Male')->value(2),
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
            <input id="radio-6599b6a33dd96" name="radioform[text]" type="radio" value="1">
            <label for="radio-6599b6a33dd96">Female</label>
            <input id="radio-6599b6a33dd97" name="radioform[text]" type="radio" value="2">
            <label for="radio-6599b6a33dd97">Male</label>
            </div>
            HTML,
            RadioList::widget()
                ->id(null)
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Male')->value(2),
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
            <input id="radio-6599b6a33dd96" type="radio" value="1">
            <label for="radio-6599b6a33dd96">Female</label>
            <input id="radio-6599b6a33dd97" type="radio" value="2">
            <label for="radio-6599b6a33dd97">Male</label>
            </div>
            HTML,
            RadioList::widget()
                ->id('radiolist-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->name(null)
                ->render()
        );
    }
}
