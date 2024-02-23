<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Range;

use PHPForge\{Html\FormControl\Input\Range, Support\Assert};
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
            <input id="range-6582f2d099e8b" type="range" max="value">
            HTML,
            Range::widget()->id('range-6582f2d099e8b')->max('value')->render()
        );
    }

    public function testMin(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="range-6582f2d099e8b" type="range" min="value">
            HTML,
            Range::widget()->id('range-6582f2d099e8b')->min('value')->render()
        );
    }

    public function testStep(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="range-6582f2d099e8b" type="range" step="1">
            HTML,
            Range::widget()->id('range-6582f2d099e8b')->step(1)->render()
        );
    }
}
