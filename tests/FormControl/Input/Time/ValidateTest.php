<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Time;

use PHPForge\{Html\FormControl\Input\Time, Support\Assert};
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
            <input id="time-6582f2d099e8b" type="time" max="value">
            HTML,
            Time::widget()->id('time-6582f2d099e8b')->max('value')->render()
        );
    }

    public function testMin(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="time-6582f2d099e8b" type="time" min="value">
            HTML,
            Time::widget()->id('time-6582f2d099e8b')->min('value')->render()
        );
    }

    public function testStep(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="time-6582f2d099e8b" type="time" step="1">
            HTML,
            Time::widget()->id('time-6582f2d099e8b')->step('1')->render()
        );
    }

    public function testRequired(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="time-6582f2d099e8b" type="time" required>
            HTML,
            Time::widget()->id('time-6582f2d099e8b')->required()->render()
        );
    }
}
