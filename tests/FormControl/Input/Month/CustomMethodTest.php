<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Month;

use PHPForge\{Html\FormControl\Input\Month, Support\Assert};
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
            <input id="formmodelname-property" name="FormModelName[property]" type="month">
            HTML,
            Month::widget()->fieldAttributes('FormModelName', 'property')->render()
        );
    }

    public function testPrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            value
            <input id="month-6582f2d099e8b" type="month">
            HTML,
            Month::widget()->id('month-6582f2d099e8b')->prefix('value')->render()
        );
    }

    public function testPrefixAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            value
            </div>
            <input id="month-6582f2d099e8b" type="month">
            HTML,
            Month::widget()
                ->id('month-6582f2d099e8b')
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
            <input id="month-6582f2d099e8b" type="month">
            HTML,
            Month::widget()
                ->id('month-6582f2d099e8b')
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
            <article>
            value
            </article>
            <input id="month-6582f2d099e8b" type="month">
            HTML,
            Month::widget()->id('month-6582f2d099e8b')->prefix('value')->prefixTag('article')->render()
        );
    }

    public function testPrefixTagWithFalseValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            value
            <input id="month-6582f2d099e8b" type="month">
            HTML,
            Month::widget()->id('month-6582f2d099e8b')->prefix('value')->prefixTag(false)->render()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month">
            HTML,
            Month::widget()->id('month-6582f2d099e8b')->render()
        );
    }

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month">
            value
            HTML,
            Month::widget()->id('month-6582f2d099e8b')->suffix('value')->render()
        );
    }

    public function testSuffixAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month">
            <div class="value">
            value
            </div>
            HTML,
            Month::widget()
                ->id('month-6582f2d099e8b')
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
            <input id="month-6582f2d099e8b" type="month">
            <div class="value">
            value
            </div>
            HTML,
            Month::widget()
                ->id('month-6582f2d099e8b')
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
            <input id="month-6582f2d099e8b" type="month">
            <article>
            value
            </article>
            HTML,
            Month::widget()->id('month-6582f2d099e8b')->suffix('value')->suffixTag('article')->render()
        );
    }

    public function testSuffixTagWithFalseValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month">
            suffix
            HTML,
            Month::widget()->id('month-6582f2d099e8b')->suffix('suffix')->suffixTag(false)->render()
        );
    }

    public function testTemplate(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="month-6582f2d099e8b" type="month">
            </div>
            HTML,
            Month::widget()->id('month-6582f2d099e8b')->template('<div>\n{tag}\n</div>')->render()
        );
    }
}
