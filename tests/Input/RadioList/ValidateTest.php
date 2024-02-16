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
                    Radio::widget()->id('radio-6599b6a33dd96')->labelContent('Red')->value('red'),
                    Radio::widget()->id('radio-6599b6a33dd97')->labelContent('Blue')->value('blue'),
                )
                ->name('radioform[text]')
                ->required()
                ->render()
        );
    }
}
