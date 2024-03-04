<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Color;

use PHPForge\{Html\FormControl\Input\Color, Support\Assert};
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
            <input id="formmodelname-property" name="FormModelName[property]" type="color">
            HTML,
            Color::widget()->fieldAttributes('FormModelName', 'property')->render()
        );
    }

    public function testPrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            value
            <input id="color-6582f2d099e8b" type="color">
            HTML,
            Color::widget()->id('color-6582f2d099e8b')->prefix('value')->render()
        );
    }

    public function testPrefixAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            value
            </div>
            <input id="color-6582f2d099e8b" type="color">
            HTML,
            Color::widget()
                ->id('color-6582f2d099e8b')
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
            <input id="color-6582f2d099e8b" type="color">
            HTML,
            Color::widget()
                ->id('color-6582f2d099e8b')
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
            <input id="color-6582f2d099e8b" type="color">
            HTML,
            Color::widget()->id('color-6582f2d099e8b')->prefix('value')->prefixTag('article')->render()
        );
    }

    public function testPrefixTagWithFalseValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            value
            <input id="color-6582f2d099e8b" type="color">
            HTML,
            Color::widget()->id('color-6582f2d099e8b')->prefix('value')->prefixTag(false)->render()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="color-6582f2d099e8b" type="color">
            HTML,
            Color::widget()->id('color-6582f2d099e8b')->render()
        );
    }

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="color-6582f2d099e8b" type="color">
            value
            HTML,
            Color::widget()->id('color-6582f2d099e8b')->suffix('value')->render()
        );
    }

    public function testSuffixAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="color-6582f2d099e8b" type="color">
            <div class="value">
            value
            </div>
            HTML,
            Color::widget()
                ->id('color-6582f2d099e8b')
                ->suffix('value')
                ->suffixAttributes(['class' => 'value'])
                ->suffixTag('div')
                ->render()
        );
    }

    public function testSuffixContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="color-6582f2d099e8b" type="color">
            <div class="value">
            value
            </div>
            HTML,
            Color::widget()
                ->id('color-6582f2d099e8b')
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
            <input id="color-6582f2d099e8b" type="color">
            <article>
            value
            </article>
            HTML,
            Color::widget()->id('color-6582f2d099e8b')->suffix('value')->suffixTag('article')->render()
        );
    }

    public function testSuffixTagWithFalseValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="color-6582f2d099e8b" type="color">
            value
            HTML,
            Color::widget()->id('color-6582f2d099e8b')->suffix('value')->suffixTag(false)->render()
        );
    }

    public function testTemplate(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="color-6582f2d099e8b" type="color">
            </div>
            HTML,
            Color::widget()->id('color-6582f2d099e8b')->template('<div>\n{tag}\n</div>')->render()
        );
    }
}
