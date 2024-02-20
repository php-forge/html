<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Radio;

use PHPForge\Html\FormControl\Input\Radio;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

final class CustomMethodTest extends TestCase
{
    public function testContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="radio-6582f2d099e8b" type="radio">
            </div>
            HTML,
            Radio::widget()->container(true)->id('radio-6582f2d099e8b')->render()
        );
    }

    public function testContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            <input id="radio-6582f2d099e8b" type="radio">
            </div>
            HTML,
            Radio::widget()
                ->container(true)
                ->containerAttributes(['class' => 'value'])
                ->id('radio-6582f2d099e8b')
                ->render()
        );
    }

    public function testContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            <input id="radio-6582f2d099e8b" type="radio">
            </div>
            HTML,
            Radio::widget()->container(true)->containerClass('value')->id('radio-6582f2d099e8b')->render()
        );
    }

    public function testContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span><input id="radio-6582f2d099e8b" type="radio"></span>
            HTML,
            Radio::widget()->container(true)->containerTag('span')->id('radio-6582f2d099e8b')->render()
        );
    }

    public function testContainerWithFalse(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio">
            HTML,
            Radio::widget()->container(false)->id('radio-6582f2d099e8b')->render()
        );
    }

    public function testContainerWithFalseWithDefinitions(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio">
            HTML,
            Radio::widget(['container()' => [false]])->id('radio-6582f2d099e8b')->render()
        );
    }

    public function testGenerateField(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="modelname-fieldname" name="ModelName[fieldName]" type="radio">
            HTML,
            Radio::widget()->generateField('ModelName', 'fieldName')->render()
        );
    }

    public function testPrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            prefix
            <input id="radio-6582f2d099e8b" type="radio">
            HTML,
            Radio::widget()->id('radio-6582f2d099e8b')->prefix('prefix')->render()
        );
    }

    public function testPrefixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            prefix
            </div>
            <input id="radio-6582f2d099e8b" type="radio">
            HTML,
            Radio::widget()->id('radio-6582f2d099e8b')->prefix('prefix')->prefixContainer(true)->render()
        );
    }

    public function testPrefixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            prefix
            </div>
            <input id="radio-6582f2d099e8b" type="radio">
            HTML,
            Radio::widget()
                ->id('radio-6582f2d099e8b')
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
            <input id="radio-6582f2d099e8b" type="radio">
            HTML,
            Radio::widget()
                ->id('radio-6582f2d099e8b')
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
            <input id="radio-6582f2d099e8b" type="radio">
            HTML,
            Radio::widget()
                ->id('radio-6582f2d099e8b')
                ->prefix('prefix')
                ->prefixContainer(true)
                ->prefixContainerTag('span')
                ->render()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio">
            HTML,
            Radio::widget()->id('radio-6582f2d099e8b')->render()
        );
    }

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio">
            suffix
            HTML,
            Radio::widget()->id('radio-6582f2d099e8b')->suffix('suffix')->render()
        );
    }

    public function testSuffixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio">
            <div>
            suffix
            </div>
            HTML,
            Radio::widget()->id('radio-6582f2d099e8b')->suffix('suffix')->suffixContainer(true)->render()
        );
    }

    public function testSuffixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio">
            <div class="value">
            suffix
            </div>
            HTML,
            Radio::widget()
                ->id('radio-6582f2d099e8b')
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
            <input id="radio-6582f2d099e8b" type="radio">
            <div class="value">
            suffix
            </div>
            HTML,
            Radio::widget()
                ->id('radio-6582f2d099e8b')
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
            <input id="radio-6582f2d099e8b" type="radio">
            <span>suffix</span>
            HTML,
            Radio::widget()
                ->id('radio-6582f2d099e8b')
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
            <input id="radio-6582f2d099e8b" type="radio">
            </div>
            HTML,
            Radio::widget()->id('radio-6582f2d099e8b')->template('<div>\n{tag}\n</div>')->render()
        );
    }

    public function testUncheckAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="value" name="name" type="hidden" value="0">
            <input id="radio-6582f2d099e8b" name="name" type="radio">
            HTML,
            Radio::widget()
                ->id('radio-6582f2d099e8b')
                ->name('name')
                ->uncheckAttributes(['class' => 'value'])
                ->uncheckValue('0')
                ->render()
        );
    }

    public function testUncheckClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="value" name="name" type="hidden" value="0">
            <input id="radio-6582f2d099e8b" name="name" type="radio">
            HTML,
            Radio::widget()
                ->id('radio-6582f2d099e8b')
                ->name('name')
                ->uncheckClass('value')
                ->uncheckValue('0')
                ->render()
        );
    }

    public function testUncheckValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input name="name" type="hidden" value="0">
            <input id="radio-6582f2d099e8b" name="name" type="radio" value="1">
            HTML,
            Radio::widget()->id('radio-6582f2d099e8b')->name('name')->uncheckValue('0')->value(1)->render()
        );
    }
}
