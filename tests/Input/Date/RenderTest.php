<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Date;

use PHPForge\Html\Input\Date;
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
            <input id="date-6582f2d099e8b" type="date" aria-describedby="MyWidget">
            HTML,
            Date::widget()->ariaDescribedBy('MyWidget')->id('date-6582f2d099e8b')->render()
        );
    }

    public function testAriaLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="date-6582f2d099e8b" type="date" aria-label="MyWidget">
            HTML,
            Date::widget()->ariaLabel('MyWidget')->id('date-6582f2d099e8b')->render()
        );
    }

    public function testAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="class" id="date-6582f2d099e8b" type="date">
            HTML,
            Date::widget()->attributes(['class' => 'class'])->id('date-6582f2d099e8b')->render()
        );
    }

    public function testAutofocus(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="date-6582f2d099e8b" type="date" autofocus>
            HTML,
            Date::widget()->autofocus()->id('date-6582f2d099e8b')->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="class" id="date-6582f2d099e8b" type="date">
            HTML,
            Date::widget()->class('class')->id('date-6582f2d099e8b')->render()
        );
    }

    public function testDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="date-6582f2d099e8b" type="date" data-test="data-value">
            HTML,
            Date::widget()->dataAttributes(['test' => 'data-value'])->id('date-6582f2d099e8b')->render()
        );
    }

    public function testDisabled(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="date-6582f2d099e8b" type="date" disabled>
            HTML,
            Date::widget()->disabled()->id('date-6582f2d099e8b')->render()
        );
    }

    public function testForm(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="date-6582f2d099e8b" type="date" form="form">
            HTML,
            Date::widget()->form('form')->id('date-6582f2d099e8b')->render()
        );
    }

    public function testGenerateAriaDescribeBy(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="date-6582f2d099e8b" type="date" aria-describedby="date-6582f2d099e8b-help">
            HTML,
            Date::widget()->ariaDescribedBy()->id('date-6582f2d099e8b')->render()
        );
    }

    public function testGenerateAriaDescribeByWithFalse(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="date-6582f2d099e8b" type="date">
            HTML,
            Date::widget()->ariaDescribedBy(false)->id('date-6582f2d099e8b')->render()
        );
    }

    public function testHidden(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="date-6582f2d099e8b" type="date" hidden>
            HTML,
            Date::widget()->hidden()->id('date-6582f2d099e8b')->render()
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="id" type="date">
            HTML,
            Date::widget()->id('id')->render()
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="date-6582f2d099e8b" type="date" lang="en">
            HTML,
            Date::widget()->id('date-6582f2d099e8b')->lang('en')->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="date-6582f2d099e8b" name="name" type="date">
            HTML,
            Date::widget()->id('date-6582f2d099e8b')->name('name')->render()
        );
    }

    public function testPrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            prefix
            <input id="date-6582f2d099e8b" type="date">
            HTML,
            Date::widget()->id('date-6582f2d099e8b')->prefix('prefix')->render()
        );
    }

    public function testPrefixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            prefix
            </div>
            <input id="date-6582f2d099e8b" type="date">
            HTML,
            Date::widget()->id('date-6582f2d099e8b')->prefix('prefix')->prefixContainer(true)->render()
        );
    }

    public function testPrefixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="class">
            prefix
            </div>
            <input id="date-6582f2d099e8b" type="date">
            HTML,
            Date::widget()
                ->id('date-6582f2d099e8b')
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
            <input id="date-6582f2d099e8b" type="date">
            HTML,
            Date::widget()
                ->id('date-6582f2d099e8b')
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
            <input id="date-6582f2d099e8b" type="date">
            HTML,
            Date::widget()
                ->id('date-6582f2d099e8b')
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
            <input id="date-6582f2d099e8b" type="date" readonly>
            HTML,
            Date::widget()->id('date-6582f2d099e8b')->readonly()->render()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="date-6582f2d099e8b" type="date">
            HTML,
            Date::widget()->id('date-6582f2d099e8b')->render()
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="date-6582f2d099e8b" type="date" style="style">
            HTML,
            Date::widget()->id('date-6582f2d099e8b')->style('style')->render()
        );
    }

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="date-6582f2d099e8b" type="date">
            suffix
            HTML,
            Date::widget()->id('date-6582f2d099e8b')->suffix('suffix')->render()
        );
    }

    public function testSuffixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="date-6582f2d099e8b" type="date">
            <div>
            suffix
            </div>
            HTML,
            Date::widget()->id('date-6582f2d099e8b')->suffix('suffix')->suffixContainer(true)->render()
        );
    }

    public function testSuffixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="date-6582f2d099e8b" type="date">
            <div class="class">
            suffix
            </div>
            HTML,
            Date::widget()
                ->id('date-6582f2d099e8b')
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
            <input id="date-6582f2d099e8b" type="date">
            <div class="class">
            suffix
            </div>
            HTML,
            Date::widget()
                ->id('date-6582f2d099e8b')
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
            <input id="date-6582f2d099e8b" type="date">
            <article>
            suffix
            </article>
            HTML,
            Date::widget()
                ->id('date-6582f2d099e8b')
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
            <input id="date-6582f2d099e8b" type="date" tabindex="1">
            HTML,
            Date::widget()->id('date-6582f2d099e8b')->tabIndex(1)->render()
        );
    }

    public function testTemplate(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="date-6582f2d099e8b" type="date">
            suffix
            HTML,
            Date::widget()
                ->id('date-6582f2d099e8b')
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
            <input id="date-6582f2d099e8b" type="date" title="title">
            HTML,
            Date::widget()->id('date-6582f2d099e8b')->title('title')->render()
        );
    }

    public function testValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="date-6582f2d099e8b" type="date" value="value">
            HTML,
            Date::widget()->id('date-6582f2d099e8b')->value('value')->render()
        );
    }

    public function testValueWithEmpty(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="date-6582f2d099e8b" type="date">
            HTML,
            Date::widget()->id('date-6582f2d099e8b')->value(null)->render()
        );
    }
}
