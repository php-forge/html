<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\CheckboxList;

use PHPForge\{Html\FormControl\Input\Checkbox, Html\FormControl\Input\CheckboxList, Support\Assert};
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
            <div id="checkboxlist-65858c272ea89">
            <label for="checkbox-6599b6a33dd96"><input id="checkbox-6599b6a33dd96" name="CheckboxForm[text][]" type="checkbox" value="1">Apple</label>
            <label for="checkbox-6599b6a33dd98"><input id="checkbox-6599b6a33dd98" name="CheckboxForm[text][]" type="checkbox" value="2">Banana</label>
            <label for="checkbox-6599b6a33dd97"><input id="checkbox-6599b6a33dd97" name="CheckboxForm[text][]" type="checkbox" value="3">Orange</label>
            </div>
            HTML,
            CheckboxList::widget()
                ->enclosedByLabel(true)
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

    public function testLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label for="checkboxlist-65858c272ea89">Select your fruits?</label>
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
                ->label('Select your fruits?')
                ->name('CheckboxForm[text]')
                ->render(),
        );
    }

    public function testLabelAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label class="value" for="checkboxlist-65858c272ea89">Select your fruits?</label>
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
                ->labelAttributes(['class' => 'value'])
                ->label('Select your fruits?')
                ->name('CheckboxForm[text]')
                ->render(),
        );
    }

    public function testLabelClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label class="value" for="checkboxlist-65858c272ea89">Select your fruits?</label>
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
                ->labelClass('value')
                ->label('Select your fruits?')
                ->name('CheckboxForm[text]')
                ->render(),
        );
    }

    public function testLabelFor(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label for="value">Select your fruits?</label>
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
                ->label('Select your fruits?')
                ->labelFor('value')
                ->name('CheckboxForm[text]')
                ->render(),
        );
    }

    public function testLabelItemClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label for="checkboxlist-65858c272ea89">Select your fruits?</label>
            <div id="checkboxlist-65858c272ea89">
            <input id="checkbox-6599b6a33dd96" name="CheckboxForm[text][]" type="checkbox" value="1">
            <label class="value" for="checkbox-6599b6a33dd96">Apple</label>
            <input id="checkbox-6599b6a33dd98" name="CheckboxForm[text][]" type="checkbox" value="2">
            <label class="value" for="checkbox-6599b6a33dd98">Banana</label>
            <input id="checkbox-6599b6a33dd97" name="CheckboxForm[text][]" type="checkbox" value="3">
            <label class="value" for="checkbox-6599b6a33dd97">Orange</label>
            </div>
            HTML,
            CheckboxList::widget()
                ->id('checkboxlist-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->label('Apple')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd98')->label('Banana')->value(2),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->label('Orange')->value(3),
                )
                ->label('Select your fruits?')
                ->labelItemClass('value')
                ->name('CheckboxForm[text]')
                ->render(),
        );
    }

    public function testNotLabel(): void
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
                ->label('Select your gender?')
                ->name('CheckboxForm[text]')
                ->notLabel()
                ->render(),
        );
    }
}
