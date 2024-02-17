<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\DatetimeLocal;

use PHPForge\Html\Input\DatetimeLocal;
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
            <input id="datetime-local-6582f2d099e8b" type="datetime-local" max="value">
            HTML,
            DatetimeLocal::widget()->id('datetime-local-6582f2d099e8b')->max('value')->render()
        );
    }

    public function testMin(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-local-6582f2d099e8b" type="datetime-local" min="value">
            HTML,
            DatetimeLocal::widget()->id('datetime-local-6582f2d099e8b')->min('value')->render()
        );
    }

    public function step(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-local-6582f2d099e8b" type="datetime-local" step="value">
            HTML,
            DatetimeLocal::widget()->id('datetime-local-6582f2d099e8b')->step('value')->render()
        );
    }

    public function testRequired(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-local-6582f2d099e8b" type="datetime-local" required>
            HTML,
            DatetimeLocal::widget()->id('datetime-local-6582f2d099e8b')->required()->render()
        );
    }
}
