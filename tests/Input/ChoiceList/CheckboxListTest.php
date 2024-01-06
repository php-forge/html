<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\ChoiceList;

use PHPForge\Html\Input\Checkbox;
use PHPForge\Html\Input\ChoiceList;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class CheckboxListTest extends TestCase
{
    public function testAriaDescribedBy(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="choice-list-65858c272ea89">
            <input id="checkbox-6599b6a33dd96" name="CheckboxForm[text]" type="checkbox" value="1" aria-describedby="MyWidget">
            <label for="checkbox-6599b6a33dd96">Female</label>
            <input id="checkbox-6599b6a33dd97" name="CheckboxForm[text]" type="checkbox" value="2" aria-describedby="MyWidget">
            <label for="checkbox-6599b6a33dd97">Male</label>
            </div>
            HTML,
            ChoiceList::widget()
                ->ariaDescribedBy('MyWidget')
                ->id('choice-list-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->labelContent('Female')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->name('CheckboxForm[text]')
                ->render(),
        );
    }

    public function testAriaLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="choice-list-65858c272ea89">
            <input id="checkbox-6599b6a33dd96" name="CheckboxForm[text]" type="checkbox" value="1" aria-label="MyWidget">
            <label for="checkbox-6599b6a33dd96">Female</label>
            <input id="checkbox-6599b6a33dd97" name="CheckboxForm[text]" type="checkbox" value="2" aria-label="MyWidget">
            <label for="checkbox-6599b6a33dd97">Male</label>
            </div>
            HTML,
            ChoiceList::widget()
                ->ariaLabel('MyWidget')
                ->id('choice-list-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->labelContent('Female')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->name('CheckboxForm[text]')
                ->render(),
        );
    }

    public function testAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="choice-list-65858c272ea89">
            <input class="class" id="checkbox-6599b6a33dd96" name="CheckboxForm[text]" type="checkbox" value="1">
            <label for="checkbox-6599b6a33dd96">Female</label>
            <input class="class" id="checkbox-6599b6a33dd97" name="CheckboxForm[text]" type="checkbox" value="2">
            <label for="checkbox-6599b6a33dd97">Male</label>
            </div>
            HTML,
            ChoiceList::widget()
                ->attributes(['class' => 'class'])
                ->id('choice-list-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->labelContent('Female')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->name('CheckboxForm[text]')
                ->render(),
        );
    }

    public function testAutofocus(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="choice-list-65858c272ea89" autofocus>
            <input id="checkbox-6599b6a33dd96" name="CheckboxForm[text]" type="checkbox" value="1">
            <label for="checkbox-6599b6a33dd96">Female</label>
            <input id="checkbox-6599b6a33dd97" name="CheckboxForm[text]" type="checkbox" value="2">
            <label for="checkbox-6599b6a33dd97">Male</label>
            </div>
            HTML,
            Choicelist::widget()
                ->autofocus()
                ->id('choice-list-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->labelContent('Female')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->name('CheckboxForm[text]')
                ->render(),
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="choice-list-65858c272ea89">
            <input class="class" id="checkbox-6599b6a33dd96" name="CheckboxForm[text]" type="checkbox" value="1">
            <label for="checkbox-6599b6a33dd96">Female</label>
            <input class="class" id="checkbox-6599b6a33dd97" name="CheckboxForm[text]" type="checkbox" value="2">
            <label for="checkbox-6599b6a33dd97">Male</label>
            </div>
            HTML,
            Choicelist::widget()
                ->class('class')
                ->id('choice-list-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->labelContent('Female')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->name('CheckboxForm[text]')
                ->render(),
        );
    }

    public function testContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="class" id="choice-list-65858c272ea89">
            <input id="checkbox-6599b6a33dd96" name="CheckboxForm[text]" type="checkbox" value="1">
            <label for="checkbox-6599b6a33dd96">Female</label>
            <input id="checkbox-6599b6a33dd97" name="CheckboxForm[text]" type="checkbox" value="2">
            <label for="checkbox-6599b6a33dd97">Male</label>
            </div>
            HTML,
            Choicelist::widget()
                ->containerAttributes(['class' => 'class'])
                ->id('choice-list-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->labelContent('Female')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->name('CheckboxForm[text]')
                ->render(),
        );
    }

    public function testContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="class" id="choice-list-65858c272ea89">
            <input id="checkbox-6599b6a33dd96" name="CheckboxForm[text]" type="checkbox" value="1">
            <label for="checkbox-6599b6a33dd96">Female</label>
            <input id="checkbox-6599b6a33dd97" name="CheckboxForm[text]" type="checkbox" value="2">
            <label for="checkbox-6599b6a33dd97">Male</label>
            </div>
            HTML,
            Choicelist::widget()
                ->containerClass('class')
                ->id('choice-list-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->labelContent('Female')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->name('CheckboxForm[text]')
                ->render(),
        );
    }

    public function testContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <article id="choice-list-65858c272ea89">
            <input id="checkbox-6599b6a33dd96" name="CheckboxForm[text]" type="checkbox" value="1">
            <label for="checkbox-6599b6a33dd96">Female</label>
            <input id="checkbox-6599b6a33dd97" name="CheckboxForm[text]" type="checkbox" value="2">
            <label for="checkbox-6599b6a33dd97">Male</label>
            </article>
            HTML,
            Choicelist::widget()
                ->containerTag('article')
                ->id('choice-list-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->labelContent('Female')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->name('CheckboxForm[text]')
                ->render(),
        );
    }

    public function testContainerWithFalse(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="checkbox-6599b6a33dd96" name="CheckboxForm[text]" type="checkbox" value="1">
            <label for="checkbox-6599b6a33dd96">Female</label>
            <input id="checkbox-6599b6a33dd97" name="CheckboxForm[text]" type="checkbox" value="2">
            <label for="checkbox-6599b6a33dd97">Male</label>
            HTML,
            Choicelist::widget()
                ->container(false)
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->labelContent('Female')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->name('CheckboxForm[text]')
                ->render(),
        );
    }

    public function testEnclosedByLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="choice-list-65858c272ea89">
            <label for="checkbox-6599b6a33dd96"><input id="checkbox-6599b6a33dd96" name="CheckboxForm[text]" type="checkbox" value="1">Female</label>
            <label for="checkbox-6599b6a33dd97"><input id="checkbox-6599b6a33dd97" name="CheckboxForm[text]" type="checkbox" value="2">Male</label>
            </div>
            HTML,
            ChoiceList::widget()
                ->enclosedByLabel(true)
                ->id('choice-list-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->labelContent('Female')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->name('CheckboxForm[text]')
                ->render(),
        );
    }

    public function testGenerateAriaDescribedBy(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="choice-list-65858c272ea89">
            <input id="checkbox-6599b6a33dd96" name="CheckboxForm[text]" type="checkbox" value="1" aria-describedby="choice-list-65858c272ea89-help">
            <label for="checkbox-6599b6a33dd96">Female</label>
            <input id="checkbox-6599b6a33dd97" name="CheckboxForm[text]" type="checkbox" value="2" aria-describedby="choice-list-65858c272ea89-help">
            <label for="checkbox-6599b6a33dd97">Male</label>
            </div>
            HTML,
            ChoiceList::widget()
                ->ariaDescribedBy(true)
                ->id('choice-list-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->labelContent('Female')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->name('CheckboxForm[text]')
                ->render(),
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="id">
            <input id="id-checkbox-1" name="CheckboxForm[text]" type="checkbox" value="1">
            <label for="id-checkbox-1">Female</label>
            <input id="id-checkbox-2" name="CheckboxForm[text]" type="checkbox" value="2">
            <label for="id-checkbox-2">Male</label>
            </div>
            HTML,
            Choicelist::widget()
                ->id('id')
                ->items(
                    Checkbox::widget()->id('id-checkbox-1')->labelContent('Female')->value(1),
                    Checkbox::widget()->id('id-checkbox-2')->labelContent('Male')->value(2),
                )
                ->name('CheckboxForm[text]')
                ->render(),
        );
    }

    public function testLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label for="choice-list-65858c272ea89">Select your gender?</label>
            <div id="choice-list-65858c272ea89">
            <input id="checkbox-6599b6a33dd96" name="CheckboxForm[text]" type="checkbox" value="1">
            <label for="checkbox-6599b6a33dd96">Female</label>
            <input id="checkbox-6599b6a33dd97" name="CheckboxForm[text]" type="checkbox" value="2">
            <label for="checkbox-6599b6a33dd97">Male</label>
            </div>
            HTML,
            Choicelist::widget()
                ->id('choice-list-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->labelContent('Female')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->labelContent('Select your gender?')
                ->name('CheckboxForm[text]')
                ->render(),
        );
    }

    public function testLabelAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label class="class" for="choice-list-65858c272ea89">Select your gender?</label>
            <div id="choice-list-65858c272ea89">
            <input id="checkbox-6599b6a33dd96" name="CheckboxForm[text]" type="checkbox" value="1">
            <label for="checkbox-6599b6a33dd96">Female</label>
            <input id="checkbox-6599b6a33dd97" name="CheckboxForm[text]" type="checkbox" value="2">
            <label for="checkbox-6599b6a33dd97">Male</label>
            </div>
            HTML,
            Choicelist::widget()
                ->id('choice-list-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->labelContent('Female')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->labelAttributes(['class' => 'class'])
                ->labelContent('Select your gender?')
                ->name('CheckboxForm[text]')
                ->render(),
        );
    }

    public function testLabelClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label class="class" for="choice-list-65858c272ea89">Select your gender?</label>
            <div id="choice-list-65858c272ea89">
            <input id="checkbox-6599b6a33dd96" name="CheckboxForm[text]" type="checkbox" value="1">
            <label for="checkbox-6599b6a33dd96">Female</label>
            <input id="checkbox-6599b6a33dd97" name="CheckboxForm[text]" type="checkbox" value="2">
            <label for="checkbox-6599b6a33dd97">Male</label>
            </div>
            HTML,
            Choicelist::widget()
                ->id('choice-list-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->labelContent('Female')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->labelClass('class')
                ->labelContent('Select your gender?')
                ->name('CheckboxForm[text]')
                ->render(),
        );
    }

    public function testLabelItemClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label for="choice-list-65858c272ea89">Select your gender?</label>
            <div id="choice-list-65858c272ea89">
            <input id="checkbox-6599b6a33dd96" name="CheckboxForm[text]" type="checkbox" value="1">
            <label class="class" for="checkbox-6599b6a33dd96">Female</label>
            <input id="checkbox-6599b6a33dd97" name="CheckboxForm[text]" type="checkbox" value="2">
            <label class="class" for="checkbox-6599b6a33dd97">Male</label>
            </div>
            HTML,
            Choicelist::widget()
                ->id('choice-list-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->labelContent('Female')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->labelContent('Male')->value(2),
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
            <input id="checkbox-6599b6a33dd96" name="CheckboxForm[text]" type="checkbox" value="1">
            <label for="checkbox-6599b6a33dd96">Female</label>
            <input id="checkbox-6599b6a33dd97" name="CheckboxForm[text]" type="checkbox" value="2">
            <label for="checkbox-6599b6a33dd97">Male</label>
            </div>
            HTML,
            Choicelist::widget()
                ->id('choice-list-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->labelContent('Female')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->labelClass('class')
                ->labelContent('Select your gender?')
                ->name('CheckboxForm[text]')
                ->render(),
        );
    }

    public function testNotLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="choice-list-65858c272ea89">
            <input id="checkbox-6599b6a33dd96" name="CheckboxForm[text]" type="checkbox" value="1">
            <label for="checkbox-6599b6a33dd96">Female</label>
            <input id="checkbox-6599b6a33dd97" name="CheckboxForm[text]" type="checkbox" value="2">
            <label for="checkbox-6599b6a33dd97">Male</label>
            </div>
            HTML,
            Choicelist::widget()
                ->id('choice-list-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->labelContent('Female')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->labelClass('class')
                ->labelContent('Select your gender?')
                ->name('CheckboxForm[text]')
                ->notLabel()
                ->render(),
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="choice-list-65858c272ea89">
            <input id="checkbox-6599b6a33dd96" name="CheckboxForm[text]" type="checkbox" value="red">
            <label for="checkbox-6599b6a33dd96">Red</label>
            <input id="checkbox-6599b6a33dd97" name="CheckboxForm[text]" type="checkbox" value="blue">
            <label for="checkbox-6599b6a33dd97">Blue</label>
            </div>
            HTML,
            Choicelist::widget()
                ->id('choice-list-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->labelContent('Red')->value('red'),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->labelContent('Blue')->value('blue'),
                )
                ->name('CheckboxForm[text]')
                ->render(),
        );
    }

    public function testSeparator(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="choice-list-65858c272ea89">
            <input id="checkbox-6599b6a33dd96" name="CheckboxForm[text]" type="checkbox" value="red">
            <label for="checkbox-6599b6a33dd96">Red</label>
            <input id="checkbox-6599b6a33dd97" name="CheckboxForm[text]" type="checkbox" value="blue">
            <label for="checkbox-6599b6a33dd97">Blue</label>
            </div>
            HTML,
            Choicelist::widget()
                ->id('choice-list-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->labelContent('Red')->value('red'),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->labelContent('Blue')->value('blue'),
                )
                ->name('CheckboxForm[text]')
                ->separator(PHP_EOL)
                ->render(),
        );
    }

    public function testTabindex(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="choice-list-65858c272ea89" tabindex="1">
            <input id="checkbox-6599b6a33dd96" name="CheckboxForm[text]" type="checkbox" value="red">
            <label for="checkbox-6599b6a33dd96">Red</label>
            <input id="checkbox-6599b6a33dd97" name="CheckboxForm[text]" type="checkbox" value="blue">
            <label for="checkbox-6599b6a33dd97">Blue</label>
            </div>
            HTML,
            Choicelist::widget()
                ->id('choice-list-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->labelContent('Red')->value('red'),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->labelContent('Blue')->value('blue'),
                )
                ->name('CheckboxForm[text]')
                ->tabIndex(1)
                ->render(),
        );
    }

    public function testTemplate(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="choice-list-65858c272ea89">
            <input id="checkbox-6599b6a33dd96" name="CheckboxForm[text]" type="checkbox" value="red">
            <label for="checkbox-6599b6a33dd96">Red</label>
            <input id="checkbox-6599b6a33dd97" name="CheckboxForm[text]" type="checkbox" value="blue">
            <label for="checkbox-6599b6a33dd97">Blue</label>
            </div>
            <label class="class" for="choice-list-65858c272ea89">Select your gender?</label>
            HTML,
            Choicelist::widget()
                ->id('choice-list-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->labelContent('Red')->value('red'),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->labelContent('Blue')->value('blue'),
                )
                ->labelClass('class')
                ->labelContent('Select your gender?')
                ->name('CheckboxForm[text]')
                ->template('{tag}\n{label}')
                ->render(),
        );
    }

    public function testValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="choice-list-65858c272ea89">
            <input id="checkbox-6599b6a33dd96" name="CheckboxForm[text]" type="checkbox" value="1" checked>
            <label for="checkbox-6599b6a33dd96">Female</label>
            <input id="checkbox-6599b6a33dd97" name="CheckboxForm[text]" type="checkbox" value="2">
            <label for="checkbox-6599b6a33dd97">Male</label>
            </div>
            HTML,
            Choicelist::widget()
                ->checkedValue(1)
                ->id('choice-list-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->labelContent('Female')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->name('CheckboxForm[text]')
                ->render(),
        );
    }

    public function testValueWithNull(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="choice-list-65858c272ea89">
            <input id="checkbox-6599b6a33dd96" name="CheckboxForm[text]" type="checkbox" value="1">
            <label for="checkbox-6599b6a33dd96">Female</label>
            <input id="checkbox-6599b6a33dd97" name="CheckboxForm[text]" type="checkbox" value="2">
            <label for="checkbox-6599b6a33dd97">Male</label>
            </div>
            HTML,
            Choicelist::widget()
                ->checkedValue(null)
                ->id('choice-list-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->labelContent('Female')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->name('CheckboxForm[text]')
                ->render(),
        );
    }
}
