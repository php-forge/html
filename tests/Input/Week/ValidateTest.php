<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\Week;

use PHPForge\Html\Input\Week;
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
            <input id="week-6582f2d099e8b" type="week" max="value">
            HTML,
            Week::widget()->id('week-6582f2d099e8b')->max('value')->render()
        );
    }

    public function testMin(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="week-6582f2d099e8b" type="week" min="value">
            HTML,
            Week::widget()->id('week-6582f2d099e8b')->min('value')->render()
        );
    }

    public function testRequired(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="week-6582f2d099e8b" type="week" required>
            HTML,
            Week::widget()->id('week-6582f2d099e8b')->required()->render()
        );
    }
}
