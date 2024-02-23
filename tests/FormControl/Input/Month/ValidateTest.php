<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Month;

use PHPForge\{Html\FormControl\Input\Month, Support\Assert};
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
            <input id="month-6582f2d099e8b" type="month" max="value">
            HTML,
            Month::widget()->id('month-6582f2d099e8b')->max('value')->render()
        );
    }

    public function testMin(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month" min="value">
            HTML,
            Month::widget()->id('month-6582f2d099e8b')->min('value')->render()
        );
    }

    public function testRequired(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month" required>
            HTML,
            Month::widget()->id('month-6582f2d099e8b')->required()->render()
        );
    }

    public function testStep(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month" step="1">
            HTML,
            Month::widget()->id('month-6582f2d099e8b')->step(1)->render()
        );
    }
}
