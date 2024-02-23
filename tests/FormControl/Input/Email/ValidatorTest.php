<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Email;

use PHPForge\{Html\FormControl\Input\Email, Support\Assert};
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ValidatorTest extends TestCase
{
    public function testMaxlength(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email" maxlength="1">
            HTML,
            Email::widget()->id('email-65a15e0439570')->maxLength(1)->render()
        );
    }

    public function testMinlength(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email" minlength="1">
            HTML,
            Email::widget()->id('email-65a15e0439570')->minLength(1)->render()
        );
    }

    public function testPattern(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email" pattern="value">
            HTML,
            Email::widget()->id('email-65a15e0439570')->pattern('value')->render()
        );
    }

    public function testRequired(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email" required>
            HTML,
            Email::widget()->id('email-65a15e0439570')->required()->render()
        );
    }
}
