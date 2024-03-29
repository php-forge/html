<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\CheckboxList;

use PHPForge\{Html\FormControl\Input\Checkbox, Html\FormControl\Input\CheckboxList, Support\Assert};
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
            <div class="value" id="checkboxlist-65858c272ea89">
            <input id="checkbox-6599b6a33dd96" name="CheckboxForm[text][]" type="checkbox" value="1">
            <label for="checkbox-6599b6a33dd96">Apple</label>
            <input id="checkbox-6599b6a33dd98" name="CheckboxForm[text][]" type="checkbox" value="2">
            <label for="checkbox-6599b6a33dd98">Banana</label>
            <input id="checkbox-6599b6a33dd97" name="CheckboxForm[text][]" type="checkbox" value="3">
            <label for="checkbox-6599b6a33dd97">Orange</label>
            </div>
            HTML,
            CheckboxList::widget()
                ->containerAttributes(['class' => 'value'])
                ->id('checkboxlist-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->label('Apple')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd98')->label('Banana')->value(2),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->label('Orange')->value(3),
                )
                ->name('CheckboxForm[text]')
                ->render()
        );
    }

    public function testContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value" id="checkboxlist-65858c272ea89">
            <input id="checkbox-6599b6a33dd96" name="CheckboxForm[text][]" type="checkbox" value="1">
            <label for="checkbox-6599b6a33dd96">Apple</label>
            <input id="checkbox-6599b6a33dd98" name="CheckboxForm[text][]" type="checkbox" value="2">
            <label for="checkbox-6599b6a33dd98">Banana</label>
            <input id="checkbox-6599b6a33dd97" name="CheckboxForm[text][]" type="checkbox" value="3">
            <label for="checkbox-6599b6a33dd97">Orange</label>
            </div>
            HTML,
            CheckboxList::widget()
                ->containerClass('value')
                ->id('checkboxlist-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->label('Apple')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd98')->label('Banana')->value(2),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->label('Orange')->value(3),
                )
                ->name('CheckboxForm[text]')
                ->render()
        );
    }

    public function testContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <article id="checkboxlist-65858c272ea89">
            <input id="checkbox-6599b6a33dd96" name="CheckboxForm[text][]" type="checkbox" value="1">
            <label for="checkbox-6599b6a33dd96">Apple</label>
            <input id="checkbox-6599b6a33dd98" name="CheckboxForm[text][]" type="checkbox" value="2">
            <label for="checkbox-6599b6a33dd98">Banana</label>
            <input id="checkbox-6599b6a33dd97" name="CheckboxForm[text][]" type="checkbox" value="3">
            <label for="checkbox-6599b6a33dd97">Orange</label>
            </article>
            HTML,
            CheckboxList::widget()
                ->containerTag('article')
                ->id('checkboxlist-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->label('Apple')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd98')->label('Banana')->value(2),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->label('Orange')->value(3),
                )
                ->name('CheckboxForm[text]')
                ->render()
        );
    }

    public function testContainerWithFalse(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="checkbox-6599b6a33dd96" name="CheckboxForm[text][]" type="checkbox" value="1">
            <label for="checkbox-6599b6a33dd96">Apple</label>
            <input id="checkbox-6599b6a33dd98" name="CheckboxForm[text][]" type="checkbox" value="2">
            <label for="checkbox-6599b6a33dd98">Banana</label>
            <input id="checkbox-6599b6a33dd97" name="CheckboxForm[text][]" type="checkbox" value="3">
            <label for="checkbox-6599b6a33dd97">Orange</label>
            HTML,
            CheckboxList::widget()
                ->container(false)
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->label('Apple')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd98')->label('Banana')->value(2),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->label('Orange')->value(3),
                )
                ->name('CheckboxForm[text]')
                ->render()
        );
    }

    public function testContainerWithFalseWithDefinitions(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="checkbox-6599b6a33dd96" name="CheckboxForm[text][]" type="checkbox" value="1">
            <label for="checkbox-6599b6a33dd96">Apple</label>
            <input id="checkbox-6599b6a33dd98" name="CheckboxForm[text][]" type="checkbox" value="2">
            <label for="checkbox-6599b6a33dd98">Banana</label>
            <input id="checkbox-6599b6a33dd97" name="CheckboxForm[text][]" type="checkbox" value="3">
            <label for="checkbox-6599b6a33dd97">Orange</label>
            HTML,
            CheckboxList::widget(['container()' => [false]])
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->label('Apple')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd98')->label('Banana')->value(2),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->label('Orange')->value(3),
                )
                ->name('CheckboxForm[text]')
                ->render()
        );
    }

    public function testGenerateField(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="checkboxlist-65858c272ea89">
            <input id="modelname-fieldname" name="ModelName[fieldName][]" type="checkbox" value="1">
            <label for="modelname-fieldname">Apple</label>
            <input id="modelname-fieldname" name="ModelName[fieldName][]" type="checkbox" value="2">
            <label for="modelname-fieldname">Banana</label>
            <input id="modelname-fieldname" name="ModelName[fieldName][]" type="checkbox" value="3">
            <label for="modelname-fieldname">Orange</label>
            </div>
            HTML,
            CheckboxList::widget()
                ->generateField('ModelName', 'fieldName')
                ->id('checkboxlist-65858c272ea89')
                ->items(
                    Checkbox::widget()->label('Apple')->value(1),
                    Checkbox::widget()->label('Banana')->value(2),
                    Checkbox::widget()->label('Orange')->value(3),
                )
                ->render()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="checkboxlist-65858c272ea89">
            <input id="checkbox-6599b6a33dd96" name="CheckboxForm[text][]" type="checkbox" value="1">
            <label for="checkbox-6599b6a33dd96">Apple</label>
            <input id="checkbox-6599b6a33dd98" name="CheckboxForm[text][]" type="checkbox" value="2">
            <label for="checkbox-6599b6a33dd98">Banana</label>
            <input id="checkbox-6599b6a33dd97" name="CheckboxForm[text][]" type="checkbox" value="3">
            <label for="checkbox-6599b6a33dd97">Orange</label>
            </div>
            HTML,
            CheckboxList::widget()
                ->id('checkboxlist-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->label('Apple')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd98')->label('Banana')->value(2),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->label('Orange')->value(3),
                )
                ->name('CheckboxForm[text]')
                ->render(),
        );
    }

    public function testSeparator(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="checkboxlist-65858c272ea89">
            <input id="checkbox-6599b6a33dd96" name="CheckboxForm[text][]" type="checkbox" value="1">
            <label for="checkbox-6599b6a33dd96">Apple</label>
            <input id="checkbox-6599b6a33dd98" name="CheckboxForm[text][]" type="checkbox" value="2">
            <label for="checkbox-6599b6a33dd98">Banana</label>
            <input id="checkbox-6599b6a33dd97" name="CheckboxForm[text][]" type="checkbox" value="3">
            <label for="checkbox-6599b6a33dd97">Orange</label>
            </div>
            HTML,
            CheckboxList::widget()
                ->id('checkboxlist-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->label('Apple')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd98')->label('Banana')->value(2),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->label('Orange')->value(3),
                )
                ->name('CheckboxForm[text]')
                ->separator(PHP_EOL)
                ->render(),
        );
    }

    public function testTemplate(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <div id="checkboxlist-65858c272ea89">
            <input id="checkbox-6599b6a33dd96" name="CheckboxForm[text][]" type="checkbox" value="1">
            <label for="checkbox-6599b6a33dd96">Apple</label>
            <input id="checkbox-6599b6a33dd98" name="CheckboxForm[text][]" type="checkbox" value="2">
            <label for="checkbox-6599b6a33dd98">Banana</label>
            <input id="checkbox-6599b6a33dd97" name="CheckboxForm[text][]" type="checkbox" value="3">
            <label for="checkbox-6599b6a33dd97">Orange</label>
            </div>
            <label class="class" for="checkboxlist-65858c272ea89">Select your fruits?</label>
            </div>
            HTML,
            CheckboxList::widget()
                ->id('checkboxlist-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->label('Apple')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd98')->label('Banana')->value(2),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->label('Orange')->value(3),
                )
                ->labelClass('class')
                ->label('Select your fruits?')
                ->name('CheckboxForm[text]')
                ->template('<div>\n{tag}\n{label}\n</div>')
                ->render()
        );
    }

    public function testUnckedAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="checkboxlist-65858c272ea89">
            <input class="value" name="CheckboxForm[text][]" type="hidden" value="0">
            <input id="checkbox-6599b6a33dd96" name="CheckboxForm[text][]" type="checkbox" value="1">
            <label for="checkbox-6599b6a33dd96">Apple</label>
            <input id="checkbox-6599b6a33dd98" name="CheckboxForm[text][]" type="checkbox" value="2">
            <label for="checkbox-6599b6a33dd98">Banana</label>
            <input id="checkbox-6599b6a33dd97" name="CheckboxForm[text][]" type="checkbox" value="3">
            <label for="checkbox-6599b6a33dd97">Orange</label>
            </div>
            HTML,
            CheckboxList::widget()
                ->id('checkboxlist-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->label('Apple')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd98')->label('Banana')->value(2),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->label('Orange')->value(3),
                )
                ->name('CheckboxForm[text]')
                ->uncheckAttributes(['class' => 'value'])
                ->uncheckValue('0')
                ->render()
        );
    }

    public function testUncheckClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="checkboxlist-65858c272ea89">
            <input class="value" name="CheckboxForm[text][]" type="hidden" value="0">
            <input id="checkbox-6599b6a33dd96" name="CheckboxForm[text][]" type="checkbox" value="1">
            <label for="checkbox-6599b6a33dd96">Apple</label>
            <input id="checkbox-6599b6a33dd98" name="CheckboxForm[text][]" type="checkbox" value="2">
            <label for="checkbox-6599b6a33dd98">Banana</label>
            <input id="checkbox-6599b6a33dd97" name="CheckboxForm[text][]" type="checkbox" value="3">
            <label for="checkbox-6599b6a33dd97">Orange</label>
            </div>
            HTML,
            CheckboxList::widget()
                ->id('checkboxlist-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->label('Apple')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd98')->label('Banana')->value(2),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->label('Orange')->value(3),
                )
                ->name('CheckboxForm[text]')
                ->uncheckClass('value')
                ->uncheckValue('0')
                ->render()
        );
    }

    public function testUncheckValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="checkboxlist-65858c272ea89" tabindex="1">
            <input name="CheckboxForm[text][]" type="hidden" value="0">
            <input id="checkbox-6599b6a33dd96" name="CheckboxForm[text][]" type="checkbox" value="1">
            <label for="checkbox-6599b6a33dd96">Apple</label>
            <input id="checkbox-6599b6a33dd98" name="CheckboxForm[text][]" type="checkbox" value="2">
            <label for="checkbox-6599b6a33dd98">Banana</label>
            <input id="checkbox-6599b6a33dd97" name="CheckboxForm[text][]" type="checkbox" value="3">
            <label for="checkbox-6599b6a33dd97">Orange</label>
            </div>
            HTML,
            CheckboxList::widget()
                ->id('checkboxlist-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->label('Apple')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd98')->label('Banana')->value(2),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->label('Orange')->value(3),
                )
                ->name('CheckboxForm[text]')
                ->tabIndex(1)
                ->uncheckValue('0')
                ->render()
        );
    }
}
