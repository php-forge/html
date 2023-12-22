<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Range;

use PHPForge\Html\Input\Range;
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
            <input id="range-6582f2d099e8b" type="range" aria-describedby="MyWidget">
            HTML,
            Range::widget()->ariaDescribedBy('MyWidget')->id('range-6582f2d099e8b')->render()
        );
    }

    public function testAriaLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="range-6582f2d099e8b" type="range" aria-label="MyWidget">
            HTML,
            Range::widget()->ariaLabel('MyWidget')->id('range-6582f2d099e8b')->render()
        );
    }

    public function testAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="class" id="range-6582f2d099e8b" type="range">
            HTML,
            Range::widget()->attributes(['class' => 'class'])->id('range-6582f2d099e8b')->render()
        );
    }

    public function testAutofocus(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="range-6582f2d099e8b" type="range" autofocus>
            HTML,
            Range::widget()->autofocus()->id('range-6582f2d099e8b')->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="class" id="range-6582f2d099e8b" type="range">
            HTML,
            Range::widget()->class('class')->id('range-6582f2d099e8b')->render()
        );
    }

    public function testDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="range-6582f2d099e8b" type="range" data-test="data-value">
            HTML,
            Range::widget()->dataAttributes(['test' => 'data-value'])->id('range-6582f2d099e8b')->render()
        );
    }

    public function testDisabled(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="range-6582f2d099e8b" type="range" disabled>
            HTML,
            Range::widget()->disabled()->id('range-6582f2d099e8b')->render()
        );
    }

    public function testForm(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="range-6582f2d099e8b" type="range" form="form">
            HTML,
            Range::widget()->form('form')->id('range-6582f2d099e8b')->render()
        );
    }

    public function testGenerateAriaDescribeBy(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="range-6582f2d099e8b" type="range" aria-describedby="range-6582f2d099e8b-help">
            HTML,
            Range::widget()->ariaDescribedBy()->id('range-6582f2d099e8b')->render()
        );
    }

    public function testGenerateAriaDescribeByWithFalse(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="range-6582f2d099e8b" type="range">
            HTML,
            Range::widget()->ariaDescribedBy(false)->id('range-6582f2d099e8b')->render()
        );
    }

    public function testHidden(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="range-6582f2d099e8b" type="range" hidden>
            HTML,
            Range::widget()->hidden()->id('range-6582f2d099e8b')->render()
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="id" type="range">
            HTML,
            Range::widget()->id('id')->render()
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="range-6582f2d099e8b" type="range" lang="en">
            HTML,
            Range::widget()->id('range-6582f2d099e8b')->lang('en')->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="range-6582f2d099e8b" name="name" type="range">
            HTML,
            Range::widget()->id('range-6582f2d099e8b')->name('name')->render()
        );
    }

    public function testPrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            prefix
            <input id="range-6582f2d099e8b" type="range">
            HTML,
            Range::widget()->id('range-6582f2d099e8b')->prefix('prefix')->render()
        );
    }

    public function testPrefixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            prefix
            </div>
            <input id="range-6582f2d099e8b" type="range">
            HTML,
            Range::widget()->id('range-6582f2d099e8b')->prefix('prefix')->prefixContainer(true)->render()
        );
    }

    public function testPrefixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="class">
            prefix
            </div>
            <input id="range-6582f2d099e8b" type="range">
            HTML,
            Range::widget()
                ->id('range-6582f2d099e8b')
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
            <input id="range-6582f2d099e8b" type="range">
            HTML,
            Range::widget()
                ->id('range-6582f2d099e8b')
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
            <input id="range-6582f2d099e8b" type="range">
            HTML,
            Range::widget()
                ->id('range-6582f2d099e8b')
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
            <input id="range-6582f2d099e8b" type="range" readonly>
            HTML,
            Range::widget()->id('range-6582f2d099e8b')->readonly()->render()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="range-6582f2d099e8b" type="range">
            HTML,
            Range::widget()->id('range-6582f2d099e8b')->render()
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="range-6582f2d099e8b" type="range" style="style">
            HTML,
            Range::widget()->id('range-6582f2d099e8b')->style('style')->render()
        );
    }

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="range-6582f2d099e8b" type="range">
            suffix
            HTML,
            Range::widget()->id('range-6582f2d099e8b')->suffix('suffix')->render()
        );
    }

    public function testSuffixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="range-6582f2d099e8b" type="range">
            <div>
            suffix
            </div>
            HTML,
            Range::widget()->id('range-6582f2d099e8b')->suffix('suffix')->suffixContainer(true)->render()
        );
    }

    public function testSuffixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="range-6582f2d099e8b" type="range">
            <div class="class">
            suffix
            </div>
            HTML,
            Range::widget()
                ->id('range-6582f2d099e8b')
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
            <input id="range-6582f2d099e8b" type="range">
            <div class="class">
            suffix
            </div>
            HTML,
            Range::widget()
                ->id('range-6582f2d099e8b')
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
            <input id="range-6582f2d099e8b" type="range">
            <article>
            suffix
            </article>
            HTML,
            Range::widget()
                ->id('range-6582f2d099e8b')
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
            <input id="range-6582f2d099e8b" type="range" tabindex="1">
            HTML,
            Range::widget()->id('range-6582f2d099e8b')->tabIndex(1)->render()
        );
    }

    public function testTemplate(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="range-6582f2d099e8b" type="range">
            suffix
            HTML,
            Range::widget()
                ->id('range-6582f2d099e8b')
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
            <input id="range-6582f2d099e8b" type="range" title="title">
            HTML,
            Range::widget()->id('range-6582f2d099e8b')->title('title')->render()
        );
    }

    public function testValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="range-6582f2d099e8b" type="range" value="1">
            HTML,
            Range::widget()->id('range-6582f2d099e8b')->value(1)->render()
        );
    }

    public function testValueWithEmpty(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="range-6582f2d099e8b" type="range">
            HTML,
            Range::widget()->id('range-6582f2d099e8b')->value(null)->render()
        );
    }
}
