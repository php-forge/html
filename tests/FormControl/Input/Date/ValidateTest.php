<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Date;

use PHPForge\Html\FormControl\Input\Date;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ValidateTest extends TestCase
{
    public function testMax(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="date-6582f2d099e8b" type="date" max="value">
            HTML,
            Date::widget()->id('date-6582f2d099e8b')->max('value')->render()
        );
    }

    public function testMin(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="date-6582f2d099e8b" type="date" min="value">
            HTML,
            Date::widget()->id('date-6582f2d099e8b')->min('value')->render()
        );
    }

    public function testStep(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="date-6582f2d099e8b" type="date" step="1">
            HTML,
            Date::widget()->id('date-6582f2d099e8b')->step('1')->render()
        );
    }

    public function testRequired(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="date-6582f2d099e8b" type="date" required>
            HTML,
            Date::widget()->id('date-6582f2d099e8b')->required()->render()
        );
    }
}
