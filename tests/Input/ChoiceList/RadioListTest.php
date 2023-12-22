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
            <label><input class="class" type="radio" value="1">Female</label>
            <label><input class="class" type="radio" value="2">Male</label>
            </div>
            HTML,
            ChoiceList::widget()
                ->attributes(['class' => 'class'])
                ->id('choice-list-65858c272ea89')
                ->items(
                    Radio::widget()->labelContent('Female')->value(1),
                    Radio::widget()->labelContent('Male')->value(2),
                )
                ->render(),
        );
    }

    public function testAutofocus(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="choice-list-65858c272ea89" autofocus>
            <label><input type="radio" value="1">Female</label>
            <label><input type="radio" value="2">Male</label>
            </div>
            HTML,
            ChoiceList::widget()
                ->autofocus()
                ->id('choice-list-65858c272ea89')
                ->items(
                    Radio::widget()->labelContent('Female')->value(1),
                    Radio::widget()->labelContent('Male')->value(2),
                )
                ->render(),
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="choice-list-65858c272ea89">
            <label><input class="class" type="radio" value="1">Female</label>
            <label><input class="class" type="radio" value="2">Male</label>
            </div>
            HTML,
            ChoiceList::widget()
                ->class('class')
                ->id('choice-list-65858c272ea89')
                ->items(
                    Radio::widget()->labelContent('Female')->value(1),
                    Radio::widget()->labelContent('Male')->value(2),
                )
                ->render(),
        );
    }

    public function testContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="class" id="choice-list-65858c272ea89">
            <label><input type="radio" value="1">Female</label>
            <label><input type="radio" value="2">Male</label>
            </div>
            HTML,
            ChoiceList::widget()
                ->containerAttributes(['class' => 'class'])
                ->id('choice-list-65858c272ea89')
                ->items(
                    Radio::widget()->labelContent('Female')->value(1),
                    Radio::widget()->labelContent('Male')->value(2),
                )
                ->render(),
        );
    }

    public function testContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="class" id="choice-list-65858c272ea89">
            <label><input type="radio" value="1">Female</label>
            <label><input type="radio" value="2">Male</label>
            </div>
            HTML,
            ChoiceList::widget()
                ->containerClass('class')
                ->id('choice-list-65858c272ea89')
                ->items(
                    Radio::widget()->labelContent('Female')->value(1),
                    Radio::widget()->labelContent('Male')->value(2),
                )
                ->render(),
        );
    }

    public function testContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <article id="choice-list-65858c272ea89">
            <label><input type="radio" value="1">Female</label>
            <label><input type="radio" value="2">Male</label>
            </article>
            HTML,
            ChoiceList::widget()
                ->containerTag('article')
                ->id('choice-list-65858c272ea89')
                ->items(
                    Radio::widget()->labelContent('Female')->value(1),
                    Radio::widget()->labelContent('Male')->value(2),
                )
                ->render(),
        );
    }

    public function testContainerWithFalse(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label><input type="radio" value="1">Female</label>
            <label><input type="radio" value="2">Male</label>
            HTML,
            ChoiceList::widget()
                ->container(false)
                ->items(
                    Radio::widget()->labelContent('Female')->value(1),
                    Radio::widget()->labelContent('Male')->value(2),
                )
                ->render(),
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="id">
            <label><input type="radio" value="1">Female</label>
            <label><input type="radio" value="2">Male</label>
            </div>
            HTML,
            ChoiceList::widget()
                ->id('id')
                ->items(
                    Radio::widget()->labelContent('Female')->value(1),
                    Radio::widget()->labelContent('Male')->value(2),
                )
                ->render(),
        );
    }

    public function testLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label for="choice-list-65858c272ea89">Select your gender?</label>
            <div id="choice-list-65858c272ea89">
            <label><input type="radio" value="1">Female</label>
            <label><input type="radio" value="2">Male</label>
            </div>
            HTML,
            ChoiceList::widget()
                ->id('choice-list-65858c272ea89')
                ->items(
                    Radio::widget()->labelContent('Female')->value(1),
                    Radio::widget()->labelContent('Male')->value(2),
                )
                ->labelContent('Select your gender?')
                ->render(),
        );
    }

    public function testLabelAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label class="class" for="choice-list-65858c272ea89">Select your gender?</label>
            <div id="choice-list-65858c272ea89">
            <label><input type="radio" value="1">Female</label>
            <label><input type="radio" value="2">Male</label>
            </div>
            HTML,
            ChoiceList::widget()
                ->id('choice-list-65858c272ea89')
                ->items(
                    Radio::widget()->labelContent('Female')->value(1),
                    Radio::widget()->labelContent('Male')->value(2),
                )
                ->labelContent('Select your gender?')
                ->labelAttributes(['class' => 'class'])
                ->render(),
        );
    }

    public function testLabelClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label class="class" for="choice-list-65858c272ea89">Select your gender?</label>
            <div id="choice-list-65858c272ea89">
            <label><input type="radio" value="1">Female</label>
            <label><input type="radio" value="2">Male</label>
            </div>
            HTML,
            ChoiceList::widget()
                ->id('choice-list-65858c272ea89')
                ->items(
                    Radio::widget()->labelContent('Female')->value(1),
                    Radio::widget()->labelContent('Male')->value(2),
                )
                ->labelContent('Select your gender?')
                ->labelClass('class')
                ->render(),
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label class="class" for="choice-list-65858c272ea89">Select your gender?</label>
            <div id="choice-list-65858c272ea89">
            <label><input name="RadioList" type="radio" value="1">Female</label>
            <label><input name="RadioList" type="radio" value="2">Male</label>
            </div>
            HTML,
            ChoiceList::widget()
                ->id('choice-list-65858c272ea89')
                ->items(
                    Radio::widget()->labelContent('Female')->value(1),
                    Radio::widget()->labelContent('Male')->value(2),
                )
                ->labelContent('Select your gender?')
                ->labelClass('class')
                ->name('RadioList')
                ->render(),
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="choice-list-65858c272ea89">
            <label><input type="radio" value="red">Red</label>
            <label><input type="radio" value="blue">Blue</label>
            </div>
            HTML,
            ChoiceList::widget()
                ->id('choice-list-65858c272ea89')
                ->items(
                    Radio::widget()->labelContent('Red')->value('red'),
                    Radio::widget()->labelContent('Blue')->value('blue'),
                )
                ->render(),
        );
    }

    public function testSeparator(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="choice-list-65858c272ea89">
            <label>
            <input type="radio" value="red">
            Red
            </label>
            <label>
            <input type="radio" value="blue">
            Blue
            </label>
            </div>
            HTML,
            ChoiceList::widget()
                ->id('choice-list-65858c272ea89')
                ->items(
                    Radio::widget()->labelContent('Red')->value('red'),
                    Radio::widget()->labelContent('Blue')->value('blue'),
                )
                ->separator(PHP_EOL)
                ->render(),
        );
    }

    public function testTabindex(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="choice-list-65858c272ea89" tabindex="1">
            <label><input type="radio" value="red">Red</label>
            <label><input type="radio" value="blue">Blue</label>
            </div>
            HTML,
            ChoiceList::widget()
                ->id('choice-list-65858c272ea89')
                ->items(
                    Radio::widget()->labelContent('Red')->value('red'),
                    Radio::widget()->labelContent('Blue')->value('blue'),
                )
                ->tabIndex(1)
                ->render(),
        );
    }

    public function testValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="choice-list-65858c272ea89">
            <label><input type="radio" value="1">Female</label>
            <label><input type="radio" value="2" checked>Male</label>
            </div>
            HTML,
            ChoiceList::widget()
                ->id('choice-list-65858c272ea89')
                ->items(
                    Radio::widget()->labelContent('Female')->value(1),
                    Radio::widget()->labelContent('Male')->value(2),
                )
                ->value(2)
                ->render(),
        );
    }
}
