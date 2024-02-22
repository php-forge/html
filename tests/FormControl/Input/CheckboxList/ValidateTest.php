<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\CheckboxList;

use PHPForge\Html\FormControl\Input\{Checkbox, CheckboxList};
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ValidateTest extends TestCase
{
    public function testRequired(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="checkboxlist-65858c272ea89">
            <input id="checkbox-6599b6a33dd96" name="CheckboxForm[text][]" type="checkbox" value="1" required>
            <label for="checkbox-6599b6a33dd96">Apple</label>
            <input id="checkbox-6599b6a33dd98" name="CheckboxForm[text][]" type="checkbox" value="2" required>
            <label for="checkbox-6599b6a33dd98">Banana</label>
            <input id="checkbox-6599b6a33dd97" name="CheckboxForm[text][]" type="checkbox" value="3" required>
            <label for="checkbox-6599b6a33dd97">Orange</label>
            </div>
            HTML,
            CheckboxList::widget()
                ->required()
                ->id('checkboxlist-65858c272ea89')
                ->items(
                    Checkbox::widget()->id('checkbox-6599b6a33dd96')->required()->label('Apple')->value(1),
                    Checkbox::widget()->id('checkbox-6599b6a33dd98')->required()->label('Banana')->value(2),
                    Checkbox::widget()->id('checkbox-6599b6a33dd97')->required()->label('Orange')->value(3),
                )
                ->name('CheckboxForm[text]')
                ->render(),
        );
    }
}
