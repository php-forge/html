<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Password;

use PHPForge\{Html\FormControl\Input\Password, Support\Assert};
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
            <input id="password-6582f2d099e8b" type="password" maxlength="1">
            HTML,
            Password::widget()->id('password-6582f2d099e8b')->maxlength(1)->render()
        );
    }

    public function testMinLength(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="password-6582f2d099e8b" type="password" minlength="1">
            HTML,
            Password::widget()->id('password-6582f2d099e8b')->minlength(1)->render()
        );
    }

    public function testPattern(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="password-6582f2d099e8b" type="password" pattern="value">
            HTML,
            Password::widget()->id('password-6582f2d099e8b')->pattern('value')->render()
        );
    }

    public function testRequired(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="password-6582f2d099e8b" type="password" required>
            HTML,
            Password::widget()->id('password-6582f2d099e8b')->required()->render()
        );
    }
}
