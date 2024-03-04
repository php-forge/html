<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Search;

use PHPForge\{Html\FormControl\Input\Search, Support\Assert};
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
            <input id="formmodelname-property" name="FormModelName[property]" type="search">
            HTML,
            Search::widget()->fieldAttributes('FormModelName', 'property')->render()
        );
    }

    public function testPrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            value
            <input id="search-6582f2d099e8b" type="search">
            HTML,
            Search::widget()->id('search-6582f2d099e8b')->prefix('value')->render()
        );
    }

    public function testPrefixAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            value
            </div>
            <input id="search-6582f2d099e8b" type="search">
            HTML,
            Search::widget()
                ->id('search-6582f2d099e8b')
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
            <input id="search-6582f2d099e8b" type="search">
            HTML,
            Search::widget()
                ->id('search-6582f2d099e8b')
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
            <input id="search-6582f2d099e8b" type="search">
            HTML,
            Search::widget()->id('search-6582f2d099e8b')->prefix('value')->prefixTag('article')->render()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="search-6582f2d099e8b" type="search">
            HTML,
            Search::widget()->id('search-6582f2d099e8b')->render()
        );
    }

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="search-6582f2d099e8b" type="search">
            value
            HTML,
            Search::widget()->id('search-6582f2d099e8b')->suffix('value')->render()
        );
    }

    public function testSuffixAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="search-6582f2d099e8b" type="search">
            <div class="value">
            value
            </div>
            HTML,
            Search::widget()
                ->id('search-6582f2d099e8b')
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
            <input id="search-6582f2d099e8b" type="search">
            <div class="value">
            value
            </div>
            HTML,
            Search::widget()
                ->id('search-6582f2d099e8b')
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
            <input id="search-6582f2d099e8b" type="search">
            <article>
            value
            </article>
            HTML,
            Search::widget()->id('search-6582f2d099e8b')->suffix('value')->suffixTag('article')->render()
        );
    }

    public function testSuffixTagWithFalseValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="search-6582f2d099e8b" type="search">
            value
            HTML,
            Search::widget()->id('search-6582f2d099e8b')->suffix('value')->suffixTag(false)->render()
        );
    }

    public function testTemplate(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="search-6582f2d099e8b" type="search">
            </div>
            HTML,
            Search::widget()->id('search-6582f2d099e8b')->template('<div>\n{tag}\n</div>')->render()
        );
    }
}
