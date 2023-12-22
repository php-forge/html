<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\Month;

use PHPForge\Html\Input\Month;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class RenderTest extends TestCase
{
    public function testAriaDescribedBy(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month" aria-describedby="MyWidget">
            HTML,
            Month::widget()->ariaDescribedBy('MyWidget')->id('month-6582f2d099e8b')->render()
        );
    }

    public function testAriaLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month" aria-label="MyWidget">
            HTML,
            Month::widget()->ariaLabel('MyWidget')->id('month-6582f2d099e8b')->render()
        );
    }

    public function testAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="class" id="month-6582f2d099e8b" type="month">
            HTML,
            Month::widget()->attributes(['class' => 'class'])->id('month-6582f2d099e8b')->render()
        );
    }

    public function testAutofocus(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month" autofocus>
            HTML,
            Month::widget()->autofocus()->id('month-6582f2d099e8b')->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="class" id="month-6582f2d099e8b" type="month">
            HTML,
            Month::widget()->class('class')->id('month-6582f2d099e8b')->render()
        );
    }

    public function testDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month" data-test="data-value">
            HTML,
            Month::widget()->dataAttributes(['test' => 'data-value'])->id('month-6582f2d099e8b')->render()
        );
    }

    public function testDisabled(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month" disabled>
            HTML,
            Month::widget()->disabled()->id('month-6582f2d099e8b')->render()
        );
    }

    public function testForm(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month" form="form">
            HTML,
            Month::widget()->form('form')->id('month-6582f2d099e8b')->render()
        );
    }

    public function testGenerateAriaDescribeBy(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month" aria-describedby="month-6582f2d099e8b-help">
            HTML,
            Month::widget()->ariaDescribedBy()->id('month-6582f2d099e8b')->render()
        );
    }

    public function testGenerateAriaDescribeByWithFalse(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month">
            HTML,
            Month::widget()->ariaDescribedBy(false)->id('month-6582f2d099e8b')->render()
        );
    }

    public function testHidden(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month" hidden>
            HTML,
            Month::widget()->hidden()->id('month-6582f2d099e8b')->render()
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="id" type="month">
            HTML,
            Month::widget()->id('id')->render()
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month" lang="en">
            HTML,
            Month::widget()->id('month-6582f2d099e8b')->lang('en')->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" name="name" type="month">
            HTML,
            Month::widget()->id('month-6582f2d099e8b')->name('name')->render()
        );
    }

    public function testPrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            prefix
            <input id="month-6582f2d099e8b" type="month">
            HTML,
            Month::widget()->id('month-6582f2d099e8b')->prefix('prefix')->render()
        );
    }

    public function testPrefixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            prefix
            </div>
            <input id="month-6582f2d099e8b" type="month">
            HTML,
            Month::widget()->id('month-6582f2d099e8b')->prefix('prefix')->prefixContainer(true)->render()
        );
    }

    public function testPrefixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="class">
            prefix
            </div>
            <input id="month-6582f2d099e8b" type="month">
            HTML,
            Month::widget()
                ->id('month-6582f2d099e8b')
                ->prefix('prefix')
                ->prefixContainer(true)
                ->prefixContainerAttributes(['class' => 'class'])
                ->render()
        );
    }

    public function testPrefixContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="class">
            prefix
            </div>
            <input id="month-6582f2d099e8b" type="month">
            HTML,
            Month::widget()
                ->id('month-6582f2d099e8b')
                ->prefix('prefix')
                ->prefixContainer(true)
                ->prefixContainerClass('class')
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
            <input id="month-6582f2d099e8b" type="month">
            HTML,
            Month::widget()
                ->id('month-6582f2d099e8b')
                ->prefix('prefix')
                ->prefixContainer(true)
                ->prefixContainerTag('article')
                ->render()
        );
    }

    public function testReadonly(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month" readonly>
            HTML,
            Month::widget()->id('month-6582f2d099e8b')->readonly()->render()
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

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month" style="style">
            HTML,
            Month::widget()->id('month-6582f2d099e8b')->style('style')->render()
        );
    }

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month">
            suffix
            HTML,
            Month::widget()->id('month-6582f2d099e8b')->suffix('suffix')->render()
        );
    }

    public function testSuffixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month">
            <div>
            suffix
            </div>
            HTML,
            Month::widget()->id('month-6582f2d099e8b')->suffix('suffix')->suffixContainer(true)->render()
        );
    }

    public function testSuffixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month">
            <div class="class">
            suffix
            </div>
            HTML,
            Month::widget()
                ->id('month-6582f2d099e8b')
                ->suffix('suffix')
                ->suffixContainer(true)
                ->suffixContainerAttributes(['class' => 'class'])
                ->render()
        );
    }

    public function testSuffixContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month">
            <div class="class">
            suffix
            </div>
            HTML,
            Month::widget()
                ->id('month-6582f2d099e8b')
                ->suffix('suffix')
                ->suffixContainer(true)
                ->suffixContainerClass('class')
                ->render()
        );
    }

    public function testSuffixContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month">
            <article>
            suffix
            </article>
            HTML,
            Month::widget()
                ->id('month-6582f2d099e8b')
                ->suffix('suffix')
                ->suffixContainer(true)
                ->suffixContainerTag('article')
                ->render()
        );
    }

    public function testTabIndex(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month" tabindex="1">
            HTML,
            Month::widget()->id('month-6582f2d099e8b')->tabIndex(1)->render()
        );
    }

    public function testTemplate(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month">
            suffix
            HTML,
            Month::widget()
                ->id('month-6582f2d099e8b')
                ->prefix('prefix')
                ->suffix('suffix')
                ->template('{tag}{suffix}')
                ->render()
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month" title="title">
            HTML,
            Month::widget()->id('month-6582f2d099e8b')->title('title')->render()
        );
    }

    public function testValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month" value="value">
            HTML,
            Month::widget()->id('month-6582f2d099e8b')->value('value')->render()
        );
    }

    public function testValueWithEmpty(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="month-6582f2d099e8b" type="month">
            HTML,
            Month::widget()->id('month-6582f2d099e8b')->value(null)->render()
        );
    }
}
