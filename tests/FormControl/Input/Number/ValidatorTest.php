<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Number;

use PHPForge\Html\FormControl\Input\Number;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ValidatorTest extends TestCase
{
    public function testMax(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="number-6582f2d099e8b" type="number" max="value">
            HTML,
            Number::widget()->id('number-6582f2d099e8b')->max('value')->render()
        );
    }

    public function testMin(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="number-6582f2d099e8b" type="number" min="value">
            HTML,
            Number::widget()->id('number-6582f2d099e8b')->min('value')->render()
        );
    }

    public function testRequired(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="number-6582f2d099e8b" type="number" required>
            HTML,
            Number::widget()->id('number-6582f2d099e8b')->required()->render()
        );
    }

    public function testStep(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="number-6582f2d099e8b" type="number" step="1">
            HTML,
            Number::widget()->id('number-6582f2d099e8b')->step(1)->render()
        );
    }
}
