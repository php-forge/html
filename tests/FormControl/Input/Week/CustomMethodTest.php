<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Week;

use PHPForge\Html\FormControl\Input\Week;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class CustomMethodTest extends TestCase
{
    public function testGenerateField(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="modelname-fieldname" name="ModelName[fieldName]" type="week">
            HTML,
            Week::widget()->generateField('ModelName', 'fieldName')->render()
        );
    }

    public function testPrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            prefix
            <input id="week-6582f2d099e8b" type="week">
            HTML,
            Week::widget()->id('week-6582f2d099e8b')->prefix('prefix')->render()
        );
    }

    public function testPrefixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            prefix
            </div>
            <input id="week-6582f2d099e8b" type="week">
            HTML,
            Week::widget()->id('week-6582f2d099e8b')->prefix('prefix')->prefixContainer(true)->render()
        );
    }

    public function testPrefixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            prefix
            </div>
            <input id="week-6582f2d099e8b" type="week">
            HTML,
            Week::widget()
                ->id('week-6582f2d099e8b')
                ->prefix('prefix')
                ->prefixContainer(true)
                ->prefixContainerAttributes(['class' => 'value'])
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
            <input id="week-6582f2d099e8b" type="week">
            HTML,
            Week::widget()
                ->id('week-6582f2d099e8b')
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
            <input id="week-6582f2d099e8b" type="week">
            HTML,
            Week::widget()
                ->id('week-6582f2d099e8b')
                ->prefix('prefix')
                ->prefixContainer(true)
                ->prefixContainerTag('article')
                ->render()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="week-6582f2d099e8b" type="week">
            HTML,
            Week::widget()->id('week-6582f2d099e8b')->render()
        );
    }

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="week-6582f2d099e8b" type="week">
            suffix
            HTML,
            Week::widget()->id('week-6582f2d099e8b')->suffix('suffix')->render()
        );
    }

    public function testSuffixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="week-6582f2d099e8b" type="week">
            <div>
            suffix
            </div>
            HTML,
            Week::widget()->id('week-6582f2d099e8b')->suffix('suffix')->suffixContainer(true)->render()
        );
    }

    public function testSuffixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="week-6582f2d099e8b" type="week">
            <div class="value">
            suffix
            </div>
            HTML,
            Week::widget()
                ->id('week-6582f2d099e8b')
                ->suffix('suffix')
                ->suffixContainer(true)
                ->suffixContainerAttributes(['class' => 'value'])
                ->render()
        );
    }

    public function testSuffixContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="week-6582f2d099e8b" type="week">
            <div class="value">
            suffix
            </div>
            HTML,
            Week::widget()
                ->id('week-6582f2d099e8b')
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
            <input id="week-6582f2d099e8b" type="week">
            <article>
            suffix
            </article>
            HTML,
            Week::widget()
                ->id('week-6582f2d099e8b')
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
            <input id="week-6582f2d099e8b" type="week">
            </div>
            HTML,
            Week::widget()->id('week-6582f2d099e8b')->template('<div>\n{tag}\n</div>')->render()
        );
    }
}
