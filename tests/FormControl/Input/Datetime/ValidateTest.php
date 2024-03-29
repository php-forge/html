<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Datetime;

use PHPForge\{Html\FormControl\Input\Datetime, Support\Assert};
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
            <input id="datetime-6582f2d099e8b" type="datetime" max="value">
            HTML,
            Datetime::widget()->id('datetime-6582f2d099e8b')->max('value')->render()
        );
    }

    public function testMin(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-6582f2d099e8b" type="datetime" min="value">
            HTML,
            Datetime::widget()->id('datetime-6582f2d099e8b')->min('value')->render()
        );
    }

    public function testStep(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-6582f2d099e8b" type="datetime" step="1">
            HTML,
            Datetime::widget()->id('datetime-6582f2d099e8b')->step('1')->render()
        );
    }

    public function testRequired(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-6582f2d099e8b" type="datetime" required>
            HTML,
            Datetime::widget()->id('datetime-6582f2d099e8b')->required()->render()
        );
    }
}
