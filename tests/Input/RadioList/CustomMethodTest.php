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
final class CustomMethodTest extends TestCase
{
    public function testContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value" id="radiolist-65858c272ea89">
            <input id="radio-6599b6a33dd96" name="radioform[text]" type="radio" value="1">
            <label for="radio-6599b6a33dd96">Female</label>
            <input id="radio-6599b6a33dd97" name="radioform[text]" type="radio" value="2">
            <label for="radio-6599b6a33dd97">Male</label>
            </div>
            HTML,
            RadioList::widget()
                ->containerAttributes(['class' => 'value'])
                ->id('radiolist-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->name('radioform[text]')
                ->render()
        );
    }

    public function testContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value" id="radiolist-65858c272ea89">
            <input id="radio-6599b6a33dd96" name="radioform[text]" type="radio" value="1">
            <label for="radio-6599b6a33dd96">Female</label>
            <input id="radio-6599b6a33dd97" name="radioform[text]" type="radio" value="2">
            <label for="radio-6599b6a33dd97">Male</label>
            </div>
            HTML,
            RadioList::widget()
                ->containerClass('value')
                ->id('radiolist-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->name('radioform[text]')
                ->render()
        );
    }

    public function testContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <article id="radiolist-65858c272ea89">
            <input id="radio-6599b6a33dd96" name="radioform[text]" type="radio" value="1">
            <label for="radio-6599b6a33dd96">Female</label>
            <input id="radio-6599b6a33dd97" name="radioform[text]" type="radio" value="2">
            <label for="radio-6599b6a33dd97">Male</label>
            </article>
            HTML,
            RadioList::widget()
                ->containerTag('article')
                ->id('radiolist-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->name('radioform[text]')
                ->render()
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
            RadioList::widget()
                ->container(false)
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->name('radioform[text]')
                ->render()
        );
    }

    public function testContainerWithFalseWithDefinitions(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6599b6a33dd96" name="radioform[text]" type="radio" value="1">
            <label for="radio-6599b6a33dd96">Female</label>
            <input id="radio-6599b6a33dd97" name="radioform[text]" type="radio" value="2">
            <label for="radio-6599b6a33dd97">Male</label>
            HTML,
            RadioList::widget(['container()' => [false]])
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->name('radioform[text]')
                ->render()
        );
    }

    public function testGenerateField(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="radiolist-65858c272ea89">
            <input id="modelname-fieldname" name="ModelName[fieldName]" type="radio" value="1">
            <label for="modelname-fieldname">Female</label>
            <input id="modelname-fieldname" name="ModelName[fieldName]" type="radio" value="2">
            <label for="modelname-fieldname">Male</label>
            </div>
            HTML,
            RadioList::widget()
                ->id('radiolist-65858c272ea89')
                ->generateField('ModelName', 'fieldName')
                ->items(
                    Radio::widget()->labelContent('Female')->value(1),
                    Radio::widget()->labelContent('Male')->value(2),
                )
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

    public function testTemplate(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <div id="radiolist-65858c272ea89">
            <input id="radio-6599b6a33dd96" name="radioform[text]" type="radio" value="1">
            <label for="radio-6599b6a33dd96">Female</label>
            <input id="radio-6599b6a33dd97" name="radioform[text]" type="radio" value="2">
            <label for="radio-6599b6a33dd97">Male</label>
            </div>
            <label for="radiolist-65858c272ea89">Select your fruits?</label>
            </div>
            HTML,
            RadioList::widget()
                ->id('radiolist-65858c272ea89')
                ->items(
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Female')->value(1),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Male')->value(2),
                )
                ->labelContent('Select your fruits?')
                ->name('radioform[text]')
                ->template('<div>\n{tag}\n{label}\n</div>')
                ->render()
        );
    }

    public function testUncheckAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="radiolist-65858c272ea89">
            <input class="value" name="radioform[text]" type="hidden" value="none">
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
                ->uncheckAttributes(['class' => 'value'])
                ->uncheckValue('none')
                ->render(),
        );
    }

    public function testUncheckClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="radiolist-65858c272ea89">
            <input class="value" name="radioform[text]" type="hidden" value="none">
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
                ->uncheckClass('value')
                ->uncheckValue('none')
                ->render(),
        );
    }

    public function testUncheckValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="radiolist-65858c272ea89">
            <input name="radioform[text]" type="hidden" value="none">
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
                ->uncheckValue('none')
                ->render(),
        );
    }
}
