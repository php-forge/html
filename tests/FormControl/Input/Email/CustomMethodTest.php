<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Email;

use PHPForge\{Html\FormControl\Input\Email, Support\Assert};
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class CustomMethodTest extends TestCase
{
    public function testFieldAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="formmodelname-property" name="FormModelName[property]" type="email">
            HTML,
            Email::widget()->fieldAttributes('FormModelName', 'property')->render()
        );
    }

    public function testPrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            value
            <input id="email-65a15e0439570" type="email">
            HTML,
            Email::widget()->id('email-65a15e0439570')->prefix('value')->render()
        );
    }

    public function testPrefixAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            value
            </div>
            <input id="email-65a15e0439570" type="email">
            HTML,
            Email::widget()
                ->id('email-65a15e0439570')
                ->prefix('value')
                ->prefixAttributes(['class' => 'value'])
                ->prefixTag('div')
                ->render()
        );
    }

    public function testPrefixClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            value
            </div>
            <input id="email-65a15e0439570" type="email">
            HTML,
            Email::widget()
                ->id('email-65a15e0439570')
                ->prefix('value')
                ->prefixClass('value')
                ->prefixTag('div')
                ->render()
        );
    }

    public function testPrefixTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span>value</span>
            <input id="email-65a15e0439570" type="email">
            HTML,
            Email::widget()->id('email-65a15e0439570')->prefix('value')->prefixTag('span')->render()
        );
    }

    public function testPrefixTagWithFalseValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            value
            <input id="email-65a15e0439570" type="email">
            HTML,
            Email::widget()->id('email-65a15e0439570')->prefix('value')->prefixTag(false)->render()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email">
            HTML,
            Email::widget()->id('email-65a15e0439570')->render()
        );
    }

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email">
            value
            HTML,
            Email::widget()->id('email-65a15e0439570')->suffix('value')->render()
        );
    }

    public function testSuffixAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email">
            <div class="value">
            value
            </div>
            HTML,
            Email::widget()
                ->id('email-65a15e0439570')
                ->suffix('value')
                ->suffixAttributes(['class' => 'value'])
                ->suffixTag('div')
                ->render()
        );
    }

    public function testSuffixClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email">
            <div class="value">
            value
            </div>
            HTML,
            Email::widget()
                ->id('email-65a15e0439570')
                ->suffix('value')
                ->suffixClass('value')
                ->suffixTag('div')
                ->render()
        );
    }

    public function testSuffixTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email">
            <span>value</span>
            HTML,
            Email::widget()->id('email-65a15e0439570')->suffix('value')->suffixTag('span')->render()
        );
    }

    public function testSuffixTagWithFalseValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="email-65a15e0439570" type="email">
            value
            HTML,
            Email::widget()->id('email-65a15e0439570')->suffix('value')->suffixTag(false)->render()
        );
    }

    public function testTemplate(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="email-65a15e0439570" type="email">
            </div>
            HTML,
            Email::widget()->id('email-65a15e0439570')->template('<div>\n{tag}\n</div>')->render()
        );
    }
}
