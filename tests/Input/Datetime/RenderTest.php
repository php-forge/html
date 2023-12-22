<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Datetime;

use PHPForge\Html\Input\Datetime;
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
            <input id="datetime-6582f2d099e8b" type="datetime" aria-describedby="MyWidget">
            HTML,
            Datetime::widget()->ariaDescribedBy('MyWidget')->id('datetime-6582f2d099e8b')->render()
        );
    }

    public function testAriaLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-6582f2d099e8b" type="datetime" aria-label="MyWidget">
            HTML,
            Datetime::widget()->ariaLabel('MyWidget')->id('datetime-6582f2d099e8b')->render()
        );
    }

    public function testAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="class" id="datetime-6582f2d099e8b" type="datetime">
            HTML,
            Datetime::widget()->attributes(['class' => 'class'])->id('datetime-6582f2d099e8b')->render()
        );
    }

    public function testAutofocus(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-6582f2d099e8b" type="datetime" autofocus>
            HTML,
            Datetime::widget()->autofocus()->id('datetime-6582f2d099e8b')->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="class" id="datetime-6582f2d099e8b" type="datetime">
            HTML,
            Datetime::widget()->class('class')->id('datetime-6582f2d099e8b')->render()
        );
    }

    public function testDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-6582f2d099e8b" type="datetime" data-test="data-value">
            HTML,
            Datetime::widget()->dataAttributes(['test' => 'data-value'])->id('datetime-6582f2d099e8b')->render()
        );
    }

    public function testDisabled(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-6582f2d099e8b" type="datetime" disabled>
            HTML,
            Datetime::widget()->disabled()->id('datetime-6582f2d099e8b')->render()
        );
    }

    public function testForm(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-6582f2d099e8b" type="datetime" form="form">
            HTML,
            Datetime::widget()->form('form')->id('datetime-6582f2d099e8b')->render()
        );
    }

    public function testGenerateAriaDescribeBy(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-6582f2d099e8b" type="datetime" aria-describedby="datetime-6582f2d099e8b-help">
            HTML,
            Datetime::widget()->ariaDescribedBy()->id('datetime-6582f2d099e8b')->render()
        );
    }

    public function testGenerateAriaDescribeByWithFalse(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-6582f2d099e8b" type="datetime">
            HTML,
            Datetime::widget()->ariaDescribedBy(false)->id('datetime-6582f2d099e8b')->render()
        );
    }

    public function testHidden(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-6582f2d099e8b" type="datetime" hidden>
            HTML,
            Datetime::widget()->hidden()->id('datetime-6582f2d099e8b')->render()
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="id" type="datetime">
            HTML,
            Datetime::widget()->id('id')->render()
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-6582f2d099e8b" type="datetime" lang="en">
            HTML,
            Datetime::widget()->id('datetime-6582f2d099e8b')->lang('en')->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-6582f2d099e8b" name="name" type="datetime">
            HTML,
            Datetime::widget()->id('datetime-6582f2d099e8b')->name('name')->render()
        );
    }

    public function testPrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            prefix
            <input id="datetime-6582f2d099e8b" type="datetime">
            HTML,
            Datetime::widget()->id('datetime-6582f2d099e8b')->prefix('prefix')->render()
        );
    }

    public function testPrefixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            prefix
            </div>
            <input id="datetime-6582f2d099e8b" type="datetime">
            HTML,
            Datetime::widget()->id('datetime-6582f2d099e8b')->prefix('prefix')->prefixContainer(true)->render()
        );
    }

    public function testPrefixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="class">
            prefix
            </div>
            <input id="datetime-6582f2d099e8b" type="datetime">
            HTML,
            Datetime::widget()
                ->id('datetime-6582f2d099e8b')
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
            <input id="datetime-6582f2d099e8b" type="datetime">
            HTML,
            Datetime::widget()
                ->id('datetime-6582f2d099e8b')
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
            <input id="datetime-6582f2d099e8b" type="datetime">
            HTML,
            Datetime::widget()
                ->id('datetime-6582f2d099e8b')
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
            <input id="datetime-6582f2d099e8b" type="datetime" readonly>
            HTML,
            Datetime::widget()->id('datetime-6582f2d099e8b')->readonly()->render()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-6582f2d099e8b" type="datetime">
            HTML,
            Datetime::widget()->id('datetime-6582f2d099e8b')->render()
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-6582f2d099e8b" type="datetime" style="style">
            HTML,
            Datetime::widget()->id('datetime-6582f2d099e8b')->style('style')->render()
        );
    }

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-6582f2d099e8b" type="datetime">
            suffix
            HTML,
            Datetime::widget()->id('datetime-6582f2d099e8b')->suffix('suffix')->render()
        );
    }

    public function testSuffixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-6582f2d099e8b" type="datetime">
            <div>
            suffix
            </div>
            HTML,
            Datetime::widget()->id('datetime-6582f2d099e8b')->suffix('suffix')->suffixContainer(true)->render()
        );
    }

    public function testSuffixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-6582f2d099e8b" type="datetime">
            <div class="class">
            suffix
            </div>
            HTML,
            Datetime::widget()
                ->id('datetime-6582f2d099e8b')
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
            <input id="datetime-6582f2d099e8b" type="datetime">
            <div class="class">
            suffix
            </div>
            HTML,
            Datetime::widget()
                ->id('datetime-6582f2d099e8b')
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
            <input id="datetime-6582f2d099e8b" type="datetime">
            <article>
            suffix
            </article>
            HTML,
            Datetime::widget()
                ->id('datetime-6582f2d099e8b')
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
            <input id="datetime-6582f2d099e8b" type="datetime" tabindex="1">
            HTML,
            Datetime::widget()->id('datetime-6582f2d099e8b')->tabIndex(1)->render()
        );
    }

    public function testTemplate(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-6582f2d099e8b" type="datetime">
            suffix
            HTML,
            Datetime::widget()
                ->id('datetime-6582f2d099e8b')
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
            <input id="datetime-6582f2d099e8b" type="datetime" title="title">
            HTML,
            Datetime::widget()->id('datetime-6582f2d099e8b')->title('title')->render()
        );
    }

    public function testValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-6582f2d099e8b" type="datetime" value="value">
            HTML,
            Datetime::widget()->id('datetime-6582f2d099e8b')->value('value')->render()
        );
    }

    public function testValueWithEmpty(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-6582f2d099e8b" type="datetime">
            HTML,
            Datetime::widget()->id('datetime-6582f2d099e8b')->value(null)->render()
        );
    }
}
