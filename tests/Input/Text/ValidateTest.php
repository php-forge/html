<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\Text;

use PHPForge\Html\Input\Text;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ValidateTest extends TestCase
{
    public function testMaxLength(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="text" maxlength="1">
            HTML,
            Text::widget()->id('text-6582f2d099e8b')->maxlength(1)->render()
        );
    }

    public function testMinLength(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="text" minlength="1">
            HTML,
            Text::widget()->id('text-6582f2d099e8b')->minlength(1)->render()
        );
    }

    public function testPattern(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="text" pattern="value">
            HTML,
            Text::widget()->id('text-6582f2d099e8b')->pattern('value')->render()
        );
    }

    public function testRequired(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="text" required>
            HTML,
            Text::widget()->id('text-6582f2d099e8b')->required()->render()
        );
    }
}
