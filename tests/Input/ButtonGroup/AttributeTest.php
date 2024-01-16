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
final class AttributeTest extends TestCase
{
    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="button-6582f2d099e8a" type="submit" value="Submit">
            <input id="button-6582f2d099e8b" type="reset" value="Reset">
            </div>
            HTML,
            ButtonGroup::widget()
                ->buttons(
                    Button::widget()->id('button-6582f2d099e8a')->type('submit')->value('Submit'),
                    Button::widget()->id('button-6582f2d099e8b')->type('reset')->value('Reset')
                )
                ->render()
        );
    }
}
