<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\CheckboxList;

use PHPForge\Html\Input\Checkbox;
use PHPForge\Html\Input\CheckboxList;
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
            <div id="checkboxlist-65858c272ea89">
            <input id="checkbox-6599b6a33dd96" name="CheckboxForm[text][]" type="checkbox" value="1" aria-describedby="value">
            <label for="checkbox-6599b6a33dd96">Apple</label>
            <input id="checkbox-6599b6a33dd98" name="CheckboxForm[text][]" type="checkbox" value="2" aria-describedby="value">
            <label for="checkbox-6599b6a33dd98">Banana</label>
            <input id="checkbox-6599b6a33dd97" name="CheckboxForm[text][]" type="checkbox" value="3" aria-describedby="value">
            <label for="checkbox-6599b6a33dd97">Orange</label>
            </div>
            HTML,
            CheckboxList::widget()
                ->ariaDescribedBy('value')
                ->id('checkboxlist-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->labelContent('Apple')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd98')->labelContent('Banana')->value(2),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->labelContent('Orange')->value(3),
                )
                ->name('CheckboxForm[text]')
                ->render()
        );
    }

    public function testAriaLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="checkboxlist-65858c272ea89">
            <input id="checkbox-6599b6a33dd96" name="CheckboxForm[text][]" type="checkbox" value="1" aria-label="value">
            <label for="checkbox-6599b6a33dd96">Apple</label>
            <input id="checkbox-6599b6a33dd98" name="CheckboxForm[text][]" type="checkbox" value="2" aria-label="value">
            <label for="checkbox-6599b6a33dd98">Banana</label>
            <input id="checkbox-6599b6a33dd97" name="CheckboxForm[text][]" type="checkbox" value="3" aria-label="value">
            <label for="checkbox-6599b6a33dd97">Orange</label>
            </div>
            HTML,
            CheckboxList::widget()
                ->ariaLabel('value')
                ->id('checkboxlist-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->labelContent('Apple')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd98')->labelContent('Banana')->value(2),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->labelContent('Orange')->value(3),
                )
                ->name('CheckboxForm[text]')
                ->render()
        );
    }

    public function testAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="checkboxlist-65858c272ea89">
            <input class="value" id="checkbox-6599b6a33dd96" name="CheckboxForm[text][]" type="checkbox" value="1">
            <label for="checkbox-6599b6a33dd96">Apple</label>
            <input class="value" id="checkbox-6599b6a33dd98" name="CheckboxForm[text][]" type="checkbox" value="2">
            <label for="checkbox-6599b6a33dd98">Banana</label>
            <input class="value" id="checkbox-6599b6a33dd97" name="CheckboxForm[text][]" type="checkbox" value="3">
            <label for="checkbox-6599b6a33dd97">Orange</label>
            </div>
            HTML,
            CheckboxList::widget()
                ->attributes(['class' => 'value'])
                ->id('checkboxlist-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->labelContent('Apple')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd98')->labelContent('Banana')->value(2),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->labelContent('Orange')->value(3),
                )
                ->name('CheckboxForm[text]')
                ->render(),
        );
    }

    public function testAutofocus(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="checkboxlist-65858c272ea89" autofocus>
            <input id="checkbox-6599b6a33dd96" name="CheckboxForm[text][]" type="checkbox" value="1">
            <label for="checkbox-6599b6a33dd96">Apple</label>
            <input id="checkbox-6599b6a33dd98" name="CheckboxForm[text][]" type="checkbox" value="2">
            <label for="checkbox-6599b6a33dd98">Banana</label>
            <input id="checkbox-6599b6a33dd97" name="CheckboxForm[text][]" type="checkbox" value="3">
            <label for="checkbox-6599b6a33dd97">Orange</label>
            </div>
            HTML,
            CheckboxList::widget()
                ->autofocus()
                ->id('checkboxlist-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->labelContent('Apple')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd98')->labelContent('Banana')->value(2),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->labelContent('Orange')->value(3),
                )
                ->name('CheckboxForm[text]')
                ->render(),
        );
    }

    public function testChecked(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="checkboxlist-65858c272ea89">
            <input id="checkbox-6599b6a33dd96" name="CheckboxForm[text][]" type="checkbox" value="1" checked>
            <label for="checkbox-6599b6a33dd96">Apple</label>
            <input id="checkbox-6599b6a33dd98" name="CheckboxForm[text][]" type="checkbox" value="2" checked>
            <label for="checkbox-6599b6a33dd98">Banana</label>
            <input id="checkbox-6599b6a33dd97" name="CheckboxForm[text][]" type="checkbox" value="3">
            <label for="checkbox-6599b6a33dd97">Orange</label>
            </div>
            HTML,
            CheckboxList::widget()
                ->checked([1, 2])
                ->id('checkboxlist-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->labelContent('Apple')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd98')->labelContent('Banana')->value(2),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->labelContent('Orange')->value(3),
                )
                ->name('CheckboxForm[text]')
                ->render(),
        );
    }

    public function testCheckedWithNull(): void
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
                ->checked(null)
                ->id('checkboxlist-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->labelContent('Apple')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd98')->labelContent('Banana')->value(2),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->labelContent('Orange')->value(3),
                )
                ->name('CheckboxForm[text]')
                ->render(),
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="checkboxlist-65858c272ea89">
            <input class="value" id="checkbox-6599b6a33dd96" name="CheckboxForm[text][]" type="checkbox" value="1">
            <label for="checkbox-6599b6a33dd96">Apple</label>
            <input class="value" id="checkbox-6599b6a33dd98" name="CheckboxForm[text][]" type="checkbox" value="2">
            <label for="checkbox-6599b6a33dd98">Banana</label>
            <input class="value" id="checkbox-6599b6a33dd97" name="CheckboxForm[text][]" type="checkbox" value="3">
            <label for="checkbox-6599b6a33dd97">Orange</label>
            </div>
            HTML,
            CheckboxList::widget()
                ->class('value')
                ->id('checkboxlist-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->labelContent('Apple')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd98')->labelContent('Banana')->value(2),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->labelContent('Orange')->value(3),
                )
                ->name('CheckboxForm[text]')
                ->render(),
        );
    }

    public function testGenerateAriaDescribedBy(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="checkboxlist-65858c272ea89">
            <input id="checkbox-6599b6a33dd96" name="CheckboxForm[text][]" type="checkbox" value="1" aria-describedby="checkboxlist-65858c272ea89-help">
            <label for="checkbox-6599b6a33dd96">Apple</label>
            <input id="checkbox-6599b6a33dd98" name="CheckboxForm[text][]" type="checkbox" value="2" aria-describedby="checkboxlist-65858c272ea89-help">
            <label for="checkbox-6599b6a33dd98">Banana</label>
            <input id="checkbox-6599b6a33dd97" name="CheckboxForm[text][]" type="checkbox" value="3" aria-describedby="checkboxlist-65858c272ea89-help">
            <label for="checkbox-6599b6a33dd97">Orange</label>
            </div>
            HTML,
            CheckboxList::widget()
                ->ariaDescribedBy()
                ->id('checkboxlist-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->labelContent('Apple')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd98')->labelContent('Banana')->value(2),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->labelContent('Orange')->value(3),
                )
                ->name('CheckboxForm[text]')
                ->render(),
        );
    }

    public function testGenerateAriaDescribedByWithFalse(): void
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
                ->ariaDescribedBy(false)
                ->id('checkboxlist-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->labelContent('Apple')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd98')->labelContent('Banana')->value(2),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->labelContent('Orange')->value(3),
                )
                ->name('CheckboxForm[text]')
                ->render(),
        );
    }

    public function testGenerateId(): void
    {
        $this->assertStringContainsString('id="checkboxlist-', CheckboxList::widget()->render());
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="value">
            <input id="id-checkbox-1" name="CheckboxForm[text][]" type="checkbox" value="1">
            <label for="id-checkbox-1">Apple</label>
            <input id="id-checkbox-2" name="CheckboxForm[text][]" type="checkbox" value="2">
            <label for="id-checkbox-2">Banana</label>
            <input id="id-checkbox-3" name="CheckboxForm[text][]" type="checkbox" value="3">
            <label for="id-checkbox-3">Orange</label>
            </div>
            HTML,
            CheckboxList::widget()
                ->id('value')
                ->items(
                    Checkbox::widget()->id('id-checkbox-1')->labelContent('Apple')->value(1),
                    Checkbox::widget()->id('id-checkbox-2')->labelContent('Banana')->value(2),
                    Checkbox::widget()->id('id-checkbox-3')->labelContent('Orange')->value(3),
                )
                ->name('CheckboxForm[text]')
                ->render(),
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="checkboxlist-65858c272ea89">
            <input id="checkbox-6599b6a33dd96" name="value[]" type="checkbox" value="1">
            <label for="checkbox-6599b6a33dd96">Apple</label>
            <input id="checkbox-6599b6a33dd98" name="value[]" type="checkbox" value="2">
            <label for="checkbox-6599b6a33dd98">Banana</label>
            <input id="checkbox-6599b6a33dd97" name="value[]" type="checkbox" value="3">
            <label for="checkbox-6599b6a33dd97">Orange</label>
            </div>
            HTML,
            CheckboxList::widget()
                ->id('checkboxlist-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->labelContent('Apple')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd98')->labelContent('Banana')->value(2),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->labelContent('Orange')->value(3),
                )
                ->name('value')
                ->render(),
        );
    }

    public function testTabindex(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="checkboxlist-65858c272ea89" tabindex="1">
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
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->labelContent('Apple')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd98')->labelContent('Banana')->value(2),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->labelContent('Orange')->value(3),
                )
                ->name('CheckboxForm[text]')
                ->tabIndex(1)
                ->render(),
        );
    }

    public function testValue(): void
    {
        // array with int values
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="checkboxlist-65858c272ea89">
            <input id="checkbox-6599b6a33dd96" name="CheckboxForm[text][]" type="checkbox" value="1" checked>
            <label for="checkbox-6599b6a33dd96">Apple</label>
            <input id="checkbox-6599b6a33dd98" name="CheckboxForm[text][]" type="checkbox" value="2">
            <label for="checkbox-6599b6a33dd98">Banana</label>
            <input id="checkbox-6599b6a33dd97" name="CheckboxForm[text][]" type="checkbox" value="3" checked>
            <label for="checkbox-6599b6a33dd97">Orange</label>
            </div>
            HTML,
            CheckboxList::widget()
                ->checked([1, 3])
                ->id('checkboxlist-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->labelContent('Apple')->value('1'),
                    Checkbox::widget()->id('checkbox-6599b6a33dd98')->labelContent('Banana')->value('2'),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->labelContent('Orange')->value('3'),
                )
                ->name('CheckboxForm[text]')
                ->render(),
        );

        // array with string values
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="checkboxlist-65858c272ea89">
            <input id="checkbox-6599b6a33dd96" name="CheckboxForm[text][]" type="checkbox" value="1" checked>
            <label for="checkbox-6599b6a33dd96">Apple</label>
            <input id="checkbox-6599b6a33dd98" name="CheckboxForm[text][]" type="checkbox" value="2" checked>
            <label for="checkbox-6599b6a33dd98">Banana</label>
            <input id="checkbox-6599b6a33dd97" name="CheckboxForm[text][]" type="checkbox" value="3">
            <label for="checkbox-6599b6a33dd97">Orange</label>
            </div>
            HTML,
            CheckboxList::widget()
                ->checked(['1', '2'])
                ->id('checkboxlist-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->labelContent('Apple')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd98')->labelContent('Banana')->value(2),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->labelContent('Orange')->value(3),
                )
                ->name('CheckboxForm[text]')
                ->render(),
        );

        // value not in array
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
                ->checked([7])
                ->id('checkboxlist-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->labelContent('Apple')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd98')->labelContent('Banana')->value(2),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->labelContent('Orange')->value(3),
                )
                ->name('CheckboxForm[text]')
                ->render(),
        );

        // empty array
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
                ->checked([])
                ->id('checkboxlist-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->labelContent('Apple')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd98')->labelContent('Banana')->value(2),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->labelContent('Orange')->value(3),
                )
                ->name('CheckboxForm[text]')
                ->render(),
        );
    }

    public function testValueWithNull(): void
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
                ->checked(null)
                ->id('checkboxlist-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->labelContent('Apple')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd98')->labelContent('Banana')->value(2),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->labelContent('Orange')->value(3),
                )
                ->name('CheckboxForm[text]')
                ->render(),
        );
    }

    public function testWithoutId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input name="ModelName[fieldName][]" type="checkbox" value="1">
            <label>Apple</label>
            <input name="ModelName[fieldName][]" type="checkbox" value="2">
            <label>Banana</label>
            <input name="ModelName[fieldName][]" type="checkbox" value="3">
            <label>Orange</label>
            </div>
            HTML,
            CheckboxList::widget()
                ->generateField('ModelName', 'fieldName')
                ->id(null)
                ->items(
                    Checkbox::widget()->labelContent('Apple')->value(1),
                    Checkbox::widget()->labelContent('Banana')->value(2),
                    Checkbox::widget()->labelContent('Orange')->value(3),
                )
                ->render(),
        );
    }

    public function testWithoutName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="checkboxlist-65858c272ea89">
            <input id="modelname-fieldname" type="checkbox" value="1">
            <label for="modelname-fieldname">Apple</label>
            <input id="modelname-fieldname" type="checkbox" value="2">
            <label for="modelname-fieldname">Banana</label>
            <input id="modelname-fieldname" type="checkbox" value="3">
            <label for="modelname-fieldname">Orange</label>
            </div>
            HTML,
            CheckboxList::widget()
                ->generateField('ModelName', 'fieldName')
                ->id('checkboxlist-65858c272ea89')
                ->items(
                    Checkbox::widget()->labelContent('Apple')->value(1),
                    Checkbox::widget()->labelContent('Banana')->value(2),
                    Checkbox::widget()->labelContent('Orange')->value(3),
                )
                ->name(null)
                ->render(),
        );
    }
}
