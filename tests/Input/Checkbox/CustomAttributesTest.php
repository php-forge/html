<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\Checkbox;

use PHPForge\Html\Input\Checkbox;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class CustomAttributesTest extends TestCase
{
    public function testContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="checkbox-6582f2d099e8b" type="checkbox">
            </div>
            HTML,
            Checkbox::widget()->container(true)->id('checkbox-6582f2d099e8b')->render()
        );
    }

    public function testContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            <input id="checkbox-6582f2d099e8b" type="checkbox">
            </div>
            HTML,
            Checkbox::widget()
                ->container(true)
                ->containerAttributes(['class' => 'value'])
                ->id('checkbox-6582f2d099e8b')
                ->render()
        );
    }

    public function testContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            <input id="checkbox-6582f2d099e8b" type="checkbox">
            </div>
            HTML,
            Checkbox::widget()->container(true)->containerClass('value')->id('checkbox-6582f2d099e8b')->render()
        );
    }

    public function testContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span><input id="checkbox-6582f2d099e8b" type="checkbox"></span>
            HTML,
            Checkbox::widget()->container(true)->containerTag('span')->id('checkbox-6582f2d099e8b')->render()
        );
    }

    public function testContainerWithFalse(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="checkbox-6582f2d099e8b" type="checkbox">
            HTML,
            Checkbox::widget()->container(false)->id('checkbox-6582f2d099e8b')->render()
        );
    }

    public function testContainerWithFalseWithDefinitions(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="checkbox-6582f2d099e8b" type="checkbox">
            HTML,
            Checkbox::widget(['container()' => [false]])->id('checkbox-6582f2d099e8b')->render()
        );
    }

    public function testPrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            prefix
            <input id="checkbox-6582f2d099e8b" type="checkbox">
            HTML,
            Checkbox::widget()->id('checkbox-6582f2d099e8b')->prefix('prefix')->render()
        );
    }

    public function testPrefixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            prefix
            </div>
            <input id="checkbox-6582f2d099e8b" type="checkbox">
            HTML,
            Checkbox::widget()->id('checkbox-6582f2d099e8b')->prefix('prefix')->prefixContainer(true)->render()
        );
    }

    public function testPrefixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            prefix
            </div>
            <input id="checkbox-6582f2d099e8b" type="checkbox">
            HTML,
            Checkbox::widget()
                ->id('checkbox-6582f2d099e8b')
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
            <input id="checkbox-6582f2d099e8b" type="checkbox">
            HTML,
            Checkbox::widget()
                ->id('checkbox-6582f2d099e8b')
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
            <span>prefix</span>
            <input id="checkbox-6582f2d099e8b" type="checkbox">
            HTML,
            Checkbox::widget()
                ->id('checkbox-6582f2d099e8b')
                ->prefix('prefix')
                ->prefixContainer(true)
                ->prefixContainerTag('span')
                ->render()
        );
    }

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="checkbox-6582f2d099e8b" type="checkbox">
            suffix
            HTML,
            Checkbox::widget()->id('checkbox-6582f2d099e8b')->suffix('suffix')->render()
        );
    }

    public function testSuffixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="checkbox-6582f2d099e8b" type="checkbox">
            <div>
            suffix
            </div>
            HTML,
            Checkbox::widget()->id('checkbox-6582f2d099e8b')->suffix('suffix')->suffixContainer(true)->render()
        );
    }

    public function testSuffixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="checkbox-6582f2d099e8b" type="checkbox">
            <div class="value">
            suffix
            </div>
            HTML,
            Checkbox::widget()
                ->id('checkbox-6582f2d099e8b')
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
            <input id="checkbox-6582f2d099e8b" type="checkbox">
            <div class="value">
            suffix
            </div>
            HTML,
            Checkbox::widget()
                ->id('checkbox-6582f2d099e8b')
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
            <input id="checkbox-6582f2d099e8b" type="checkbox">
            <span>suffix</span>
            HTML,
            Checkbox::widget()
                ->id('checkbox-6582f2d099e8b')
                ->suffix('suffix')
                ->suffixContainer(true)
                ->suffixContainerTag('span')
                ->render()
        );
    }

    public function testTemplate(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="checkbox-6582f2d099e8b" type="checkbox">
            </div>
            HTML,
            Checkbox::widget()->id('checkbox-6582f2d099e8b')->template('<div>\n{tag}\n</div>')->render()
        );
    }

    public function testUncheckAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="value" name="value" type="hidden" value="0">
            <input id="checkbox-6582f2d099e8b" name="value" type="checkbox" value="1">
            HTML,
            Checkbox::widget()
                ->id('checkbox-6582f2d099e8b')
                ->name('value')
                ->uncheckAttributes(['class' => 'value'])
                ->uncheckValue('0')
                ->value(1)
                ->render()
        );
    }

    public function testUncheckClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="value" name="value" type="hidden" value="0">
            <input id="checkbox-6582f2d099e8b" name="value" type="checkbox" value="1">
            HTML,
            Checkbox::widget()
                ->id('checkbox-6582f2d099e8b')
                ->name('value')
                ->uncheckClass('value')
                ->uncheckValue('0')
                ->value(1)
                ->render()
        );
    }

    public function testUncheckValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input name="value" type="hidden" value="0">
            <input id="checkbox-6582f2d099e8b" name="value" type="checkbox" value="1">
            HTML,
            Checkbox::widget()->id('checkbox-6582f2d099e8b')->name('value')->uncheckValue('0')->value(1)->render()
        );
    }
}
