<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\ButtonGroup;

use PHPForge\Html\Input\Button;
use PHPForge\Html\Input\ButtonGroup;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class CustomAttributesTest extends TestCase
{
    public function testContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            <input id="button-6582f2d099e8a" type="submit" value="Submit">
            <input id="button-6582f2d099e8b" type="reset" value="Reset">
            </div>
            HTML,
            ButtonGroup::widget()
                ->buttons(
                    Button::widget()->id('button-6582f2d099e8a')->type('submit')->value('Submit'),
                    Button::widget()->id('button-6582f2d099e8b')->type('reset')->value('Reset')
                )
                ->containerAttributes(['class' => 'value'])
                ->render()
        );
    }

    public function testContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            <input id="button-6582f2d099e8a" type="submit" value="Submit">
            <input id="button-6582f2d099e8b" type="reset" value="Reset">
            </div>
            HTML,
            ButtonGroup::widget()
                ->buttons(
                    Button::widget()->id('button-6582f2d099e8a')->type('submit')->value('Submit'),
                    Button::widget()->id('button-6582f2d099e8b')->type('reset')->value('Reset')
                )
                ->containerClass('value')
                ->render()
        );
    }

    public function testContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <article>
            <input id="button-6582f2d099e8a" type="submit" value="Submit">
            <input id="button-6582f2d099e8b" type="reset" value="Reset">
            </article>
            HTML,
            ButtonGroup::widget()
                ->buttons(
                    Button::widget()->id('button-6582f2d099e8a')->type('submit')->value('Submit'),
                    Button::widget()->id('button-6582f2d099e8b')->type('reset')->value('Reset')
                )
                ->containerTag('article')
                ->render()
        );
    }

    public function testContainerWithFalse(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="button-6582f2d099e8a" type="submit" value="Submit">
            <input id="button-6582f2d099e8b" type="reset" value="Reset">
            HTML,
            ButtonGroup::widget()
                ->buttons(
                    Button::widget()->id('button-6582f2d099e8a')->type('submit')->value('Submit'),
                    Button::widget()->id('button-6582f2d099e8b')->type('reset')->value('Reset')
                )
                ->container(false)
                ->render()
        );
    }

    public function testContainerWithFalseWithDefinitions(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="button-6582f2d099e8a" type="submit" value="Submit">
            <input id="button-6582f2d099e8b" type="reset" value="Reset">
            HTML,
            ButtonGroup::widget(['container()' => [false]])
                ->buttons(
                    Button::widget()->id('button-6582f2d099e8a')->type('submit')->value('Submit'),
                    Button::widget()->id('button-6582f2d099e8b')->type('reset')->value('Reset')
                )
                ->render()
        );
    }

    public function testIndividualContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <div>
            <input id="button-6582f2d099e8a" type="submit" value="Submit">
            </div>
            <div>
            <input id="button-6582f2d099e8b" type="reset" value="Reset">
            </div>
            </div>
            HTML,
            ButtonGroup::widget()
                ->buttons(
                    Button::widget()->id('button-6582f2d099e8a')->type('submit')->value('Submit'),
                    Button::widget()->id('button-6582f2d099e8b')->type('reset')->value('Reset')
                )
                ->individualContainer(true)
                ->render()
        );
    }
}
