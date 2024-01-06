<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\ChoiceList;

use PHPForge\Html\Input\ChoiceList;
use PHPForge\Html\Input\Radio;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class RadioListTest extends TestCase
{
    public function testAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="choice-list-65858c272ea89">
            <input class="class" id="radio-6599b6a33dd96" name="radioform[text]" type="radio" value="1">
            <label for="radio-6599b6a33dd96">Female</label>
            <input class="class" id="radio-6599b6a33dd97" name="radioform[text]" type="radio" value="2">
            <label for="radio-6599b6a33dd97">Male</label>
            </div>
            HTML,
            ChoiceList::widget()
                ->attributes(['class' => 'class'])
                ->id('choice-list-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->name('radioform[text]')
                ->render(),
        );
    }

    public function testAutofocus(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="choice-list-65858c272ea89" autofocus>
            <input id="radio-6599b6a33dd96" name="radioform[text]" type="radio" value="1">
            <label for="radio-6599b6a33dd96">Female</label>
            <input id="radio-6599b6a33dd97" name="radioform[text]" type="radio" value="2">
            <label for="radio-6599b6a33dd97">Male</label>
            </div>
            HTML,
            ChoiceList::widget()
                ->autofocus()
                ->id('choice-list-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->name('radioform[text]')
                ->render(),
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="choice-list-65858c272ea89">
            <input class="class" id="radio-6599b6a33dd96" name="radioform[text]" type="radio" value="1">
            <label for="radio-6599b6a33dd96">Female</label>
            <input class="class" id="radio-6599b6a33dd97" name="radioform[text]" type="radio" value="2">
            <label for="radio-6599b6a33dd97">Male</label>
            </div>
            HTML,
            ChoiceList::widget()
                ->class('class')
                ->id('choice-list-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->name('radioform[text]')
                ->render(),
        );
    }

    public function testContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="class" id="choice-list-65858c272ea89">
            <input id="radio-6599b6a33dd96" name="radioform[text]" type="radio" value="1">
            <label for="radio-6599b6a33dd96">Female</label>
            <input id="radio-6599b6a33dd97" name="radioform[text]" type="radio" value="2">
            <label for="radio-6599b6a33dd97">Male</label>
            </div>
            HTML,
            ChoiceList::widget()
                ->containerAttributes(['class' => 'class'])
                ->id('choice-list-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->name('radioform[text]')
                ->render(),
        );
    }

    public function testContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="class" id="choice-list-65858c272ea89">
            <input id="radio-6599b6a33dd96" name="radioform[text]" type="radio" value="1">
            <label for="radio-6599b6a33dd96">Female</label>
            <input id="radio-6599b6a33dd97" name="radioform[text]" type="radio" value="2">
            <label for="radio-6599b6a33dd97">Male</label>
            </div>
            HTML,
            ChoiceList::widget()
                ->containerClass('class')
                ->id('choice-list-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->name('radioform[text]')
                ->render(),
        );
    }

    public function testContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <article id="choice-list-65858c272ea89">
            <input id="radio-6599b6a33dd96" name="radioform[text]" type="radio" value="1">
            <label for="radio-6599b6a33dd96">Female</label>
            <input id="radio-6599b6a33dd97" name="radioform[text]" type="radio" value="2">
            <label for="radio-6599b6a33dd97">Male</label>
            </article>
            HTML,
            ChoiceList::widget()
                ->containerTag('article')
                ->id('choice-list-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->name('radioform[text]')
                ->render(),
        );
    }

    public function testContainerWithFalse(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6599b6a33dd96" name="radioform[text]" type="radio" value="1">
            <label for="radio-6599b6a33dd96">Female</label>
            <input id="radio-6599b6a33dd97" name="radioform[text]" type="radio" value="2">
            <label for="radio-6599b6a33dd97">Male</label>
            HTML,
            ChoiceList::widget()
                ->container(false)
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->name('radioform[text]')
                ->render(),
        );
    }

    public function testEnclosedByLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="choice-list-65858c272ea89">
            <label for="radio-6599b6a33dd96"><input id="radio-6599b6a33dd96" name="radioform[text]" type="radio" value="1">Female</label>
            <label for="radio-6599b6a33dd97"><input id="radio-6599b6a33dd97" name="radioform[text]" type="radio" value="2">Male</label>
            </div>
            HTML,
            ChoiceList::widget()
                ->enclosedByLabel(true)
                ->id('choice-list-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->name('radioform[text]')
                ->render(),
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="id">
            <input id="id-radio-1" name="radioform[text]" type="radio" value="1">
            <label for="id-radio-1">Female</label>
            <input id="id-radio-2" name="radioform[text]" type="radio" value="2">
            <label for="id-radio-2">Male</label>
            </div>
            HTML,
            ChoiceList::widget()
                ->id('id')
                ->items(
                    Radio::widget()->id('id-radio-1')->labelContent('Female')->value(1),
                    Radio::widget()->id('id-radio-2')->labelContent('Male')->value(2),
                )
                ->name('radioform[text]')
                ->render(),
        );
    }

    public function testLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label for="choice-list-65858c272ea89">Select your gender?</label>
            <div id="choice-list-65858c272ea89">
            <input id="radio-6599b6a33dd96" name="radioform[text]" type="radio" value="1">
            <label for="radio-6599b6a33dd96">Female</label>
            <input id="radio-6599b6a33dd97" name="radioform[text]" type="radio" value="2">
            <label for="radio-6599b6a33dd97">Male</label>
            </div>
            HTML,
            ChoiceList::widget()
                ->id('choice-list-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->labelContent('Select your gender?')
                ->name('radioform[text]')
                ->render(),
        );
    }

    public function testLabelAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label class="class" for="choice-list-65858c272ea89">Select your gender?</label>
            <div id="choice-list-65858c272ea89">
            <input id="radio-6599b6a33dd96" name="radioform[text]" type="radio" value="1">
            <label for="radio-6599b6a33dd96">Female</label>
            <input id="radio-6599b6a33dd97" name="radioform[text]" type="radio" value="2">
            <label for="radio-6599b6a33dd97">Male</label>
            </div>
            HTML,
            ChoiceList::widget()
                ->id('choice-list-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->labelAttributes(['class' => 'class'])
                ->labelContent('Select your gender?')
                ->name('radioform[text]')
                ->render(),
        );
    }

    public function testLabelClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label class="class" for="choice-list-65858c272ea89">Select your gender?</label>
            <div id="choice-list-65858c272ea89">
            <input id="radio-6599b6a33dd96" name="radioform[text]" type="radio" value="1">
            <label for="radio-6599b6a33dd96">Female</label>
            <input id="radio-6599b6a33dd97" name="radioform[text]" type="radio" value="2">
            <label for="radio-6599b6a33dd97">Male</label>
            </div>
            HTML,
            ChoiceList::widget()
                ->id('choice-list-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->labelContent('Select your gender?')
                ->labelClass('class')
                ->name('radioform[text]')
                ->render(),
        );
    }

    public function testLabelItemClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label for="choice-list-65858c272ea89">Select your gender?</label>
            <div id="choice-list-65858c272ea89">
            <input id="radio-6599b6a33dd96" name="CheckboxForm[text]" type="radio" value="1">
            <label class="class" for="radio-6599b6a33dd96">Female</label>
            <input id="radio-6599b6a33dd97" name="CheckboxForm[text]" type="radio" value="2">
            <label class="class" for="radio-6599b6a33dd97">Male</label>
            </div>
            HTML,
            Choicelist::widget()
                ->id('choice-list-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->labelContent('Select your gender?')
                ->labelItemClass('class')
                ->name('CheckboxForm[text]')
                ->render(),
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label class="class" for="choice-list-65858c272ea89">Select your gender?</label>
            <div id="choice-list-65858c272ea89">
            <input id="radio-6599b6a33dd96" name="RadioList" type="radio" value="1">
            <label for="radio-6599b6a33dd96">Female</label>
            <input id="radio-6599b6a33dd97" name="RadioList" type="radio" value="2">
            <label for="radio-6599b6a33dd97">Male</label>
            </div>
            HTML,
            ChoiceList::widget()
                ->id('choice-list-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->labelContent('Select your gender?')
                ->labelClass('class')
                ->name('radioform[text]')
                ->name('RadioList')
                ->render(),
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="choice-list-65858c272ea89">
            <input id="radio-6599b6a33dd96" name="radioform[text]" type="radio" value="red">
            <label for="radio-6599b6a33dd96">Red</label>
            <input id="radio-6599b6a33dd97" name="radioform[text]" type="radio" value="blue">
            <label for="radio-6599b6a33dd97">Blue</label>
            </div>
            HTML,
            ChoiceList::widget()
                ->id('choice-list-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Red')->value('red'),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Blue')->value('blue'),
                )
                ->name('radioform[text]')
                ->render(),
        );
    }

    public function testSeparator(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="choice-list-65858c272ea89">
            <input id="radio-6599b6a33dd96" name="radioform[text]" type="radio" value="red">
            <label for="radio-6599b6a33dd96">Red</label>
            <input id="radio-6599b6a33dd97" name="radioform[text]" type="radio" value="blue">
            <label for="radio-6599b6a33dd97">Blue</label>
            </div>
            HTML,
            ChoiceList::widget()
                ->id('choice-list-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Red')->value('red'),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Blue')->value('blue'),
                )
                ->name('radioform[text]')
                ->separator(PHP_EOL)
                ->render(),
        );
    }

    public function testTabindex(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="choice-list-65858c272ea89" tabindex="1">
            <input id="radio-6599b6a33dd96" name="radioform[text]" type="radio" value="red">
            <label for="radio-6599b6a33dd96">Red</label>
            <input id="radio-6599b6a33dd97" name="radioform[text]" type="radio" value="blue">
            <label for="radio-6599b6a33dd97">Blue</label>
            </div>
            HTML,
            ChoiceList::widget()
                ->id('choice-list-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Red')->value('red'),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Blue')->value('blue'),
                )
                ->name('radioform[text]')
                ->tabIndex(1)
                ->render(),
        );
    }

    public function testValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="choice-list-65858c272ea89">
            <input id="radio-6599b6a33dd96" name="radioform[text]" type="radio" value="1" checked>
            <label for="radio-6599b6a33dd96">Female</label>
            <input id="radio-6599b6a33dd97" name="radioform[text]" type="radio" value="2">
            <label for="radio-6599b6a33dd97">Male</label>
            </div>
            HTML,
            ChoiceList::widget()
                ->checkedValue(1)
                ->id('choice-list-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->name('radioform[text]')
                ->render(),
        );
    }

    public function testValueWithNull(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="choice-list-65858c272ea89">
            <input id="radio-6599b6a33dd96" name="radioform[text]" type="radio" value="1">
            <label for="radio-6599b6a33dd96">Female</label>
            <input id="radio-6599b6a33dd97" name="radioform[text]" type="radio" value="2">
            <label for="radio-6599b6a33dd97">Male</label>
            </div>
            HTML,
            ChoiceList::widget()
                ->checkedValue(null)
                ->id('choice-list-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->name('radioform[text]')
                ->render(),
        );
    }
}
