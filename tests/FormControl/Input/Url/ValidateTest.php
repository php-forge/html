<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Url;

use PHPForge\{Html\FormControl\Input\Url, Support\Assert};
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
            <input id="url-6582f2d099e8b" type="url" maxlength="1">
            HTML,
            Url::widget()->id('url-6582f2d099e8b')->maxlength(1)->render()
        );
    }

    public function testMinLength(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="url-6582f2d099e8b" type="url" minlength="1">
            HTML,
            Url::widget()->id('url-6582f2d099e8b')->minlength(1)->render()
        );
    }

    public function testPattern(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="url-6582f2d099e8b" type="url" pattern="value">
            HTML,
            Url::widget()->id('url-6582f2d099e8b')->pattern('value')->render()
        );
    }

    public function testRequired(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="url-6582f2d099e8b" type="url" required>
            HTML,
            Url::widget()->id('url-6582f2d099e8b')->required()->render()
        );
    }
}
