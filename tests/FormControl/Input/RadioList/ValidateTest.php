<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\RadioList;

use PHPForge\{Html\FormControl\Input\Radio, Html\FormControl\Input\RadioList, Support\Assert};
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
                    Radio::widget()->id('radio-6599b6a33dd96')->label('Red')->value('red'),
                    Radio::widget()->id('radio-6599b6a33dd97')->label('Blue')->value('blue'),
                )
                ->name('radioform[text]')
                ->required()
                ->render()
        );
    }
}
