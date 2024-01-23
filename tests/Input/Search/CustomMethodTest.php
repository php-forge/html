<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\Search;

use PHPForge\Html\Input\Search;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class CustomMethodTest extends TestCase
{
    public function testPrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            prefix
            <input id="search-6582f2d099e8b" type="search">
            HTML,
            Search::widget()->id('search-6582f2d099e8b')->prefix('prefix')->render()
        );
    }

    public function testPrefixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            prefix
            </div>
            <input id="search-6582f2d099e8b" type="search">
            HTML,
            Search::widget()->id('search-6582f2d099e8b')->prefix('prefix')->prefixContainer(true)->render()
        );
    }

    public function testPrefixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            prefix
            </div>
            <input id="search-6582f2d099e8b" type="search">
            HTML,
            Search::widget()
                ->id('search-6582f2d099e8b')
                ->prefix('prefix')
                ->prefixContainer(true)
                ->prefixContainerAttributes([
                    'class' => 'value',
                ])
                ->render()
        );
    }

    public function testPrefixContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            prefix
            </div>
            <input id="search-6582f2d099e8b" type="search">
            HTML,
            Search::widget()
                ->id('search-6582f2d099e8b')
                ->prefix('prefix')
                ->prefixContainer(true)
                ->prefixContainerClass('value')
                ->render()
        );
    }

    public function testPrefixContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <article>
            prefix
            </article>
            <input id="search-6582f2d099e8b" type="search">
            HTML,
            Search::widget()
                ->id('search-6582f2d099e8b')
                ->prefix('prefix')
                ->prefixContainer(true)
                ->prefixContainerTag('article')
                ->render()
        );
    }

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="search-6582f2d099e8b" type="search">
            suffix
            HTML,
            Search::widget()->id('search-6582f2d099e8b')->suffix('suffix')->render()
        );
    }

    public function testSuffixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="search-6582f2d099e8b" type="search">
            <div>
            suffix
            </div>
            HTML,
            Search::widget()->id('search-6582f2d099e8b')->suffix('suffix')->suffixContainer(true)->render()
        );
    }

    public function testSuffixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="search-6582f2d099e8b" type="search">
            <div class="value">
            suffix
            </div>
            HTML,
            Search::widget()
                ->id('search-6582f2d099e8b')
                ->suffix('suffix')
                ->suffixContainer(true)
                ->suffixContainerAttributes([
                    'class' => 'value',
                ])
                ->render()
        );
    }

    public function testSuffixContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="search-6582f2d099e8b" type="search">
            <div class="value">
            suffix
            </div>
            HTML,
            Search::widget()
                ->id('search-6582f2d099e8b')
                ->suffix('suffix')
                ->suffixContainer(true)
                ->suffixContainerClass('value')
                ->render()
        );
    }

    public function testSuffixContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="search-6582f2d099e8b" type="search">
            <article>
            suffix
            </article>
            HTML,
            Search::widget()
                ->id('search-6582f2d099e8b')
                ->suffix('suffix')
                ->suffixContainer(true)
                ->suffixContainerTag('article')
                ->render()
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
