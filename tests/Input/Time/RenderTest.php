<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Time;

use PHPForge\Html\Input\Time;
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
            <input id="time-6582f2d099e8b" type="time" aria-describedby="MyWidget">
            HTML,
            Time::widget()->ariaDescribedBy('MyWidget')->id('time-6582f2d099e8b')->render()
        );
    }

    public function testAriaLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="time-6582f2d099e8b" type="time" aria-label="MyWidget">
            HTML,
            Time::widget()->ariaLabel('MyWidget')->id('time-6582f2d099e8b')->render()
        );
    }

    public function testAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="class" id="time-6582f2d099e8b" type="time">
            HTML,
            Time::widget()->attributes(['class' => 'class'])->id('time-6582f2d099e8b')->render()
        );
    }

    public function testAutofocus(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="time-6582f2d099e8b" type="time" autofocus>
            HTML,
            Time::widget()->autofocus()->id('time-6582f2d099e8b')->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="class" id="time-6582f2d099e8b" type="time">
            HTML,
            Time::widget()->class('class')->id('time-6582f2d099e8b')->render()
        );
    }

    public function testDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="time-6582f2d099e8b" type="time" data-test="data-value">
            HTML,
            Time::widget()->dataAttributes(['test' => 'data-value'])->id('time-6582f2d099e8b')->render()
        );
    }

    public function testDisabled(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="time-6582f2d099e8b" type="time" disabled>
            HTML,
            Time::widget()->disabled()->id('time-6582f2d099e8b')->render()
        );
    }

    public function testForm(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="time-6582f2d099e8b" type="time" form="form">
            HTML,
            Time::widget()->form('form')->id('time-6582f2d099e8b')->render()
        );
    }

    public function testGenerateAriaDescribeBy(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="time-6582f2d099e8b" type="time" aria-describedby="time-6582f2d099e8b-help">
            HTML,
            Time::widget()->ariaDescribedBy()->id('time-6582f2d099e8b')->render()
        );
    }

    public function testGenerateAriaDescribeByWithFalse(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="time-6582f2d099e8b" type="time">
            HTML,
            Time::widget()->ariaDescribedBy(false)->id('time-6582f2d099e8b')->render()
        );
    }

    public function testHidden(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="time-6582f2d099e8b" type="time" hidden>
            HTML,
            Time::widget()->hidden()->id('time-6582f2d099e8b')->render()
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="id" type="time">
            HTML,
            Time::widget()->id('id')->render()
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="time-6582f2d099e8b" type="time" lang="en">
            HTML,
            Time::widget()->id('time-6582f2d099e8b')->lang('en')->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="time-6582f2d099e8b" name="name" type="time">
            HTML,
            Time::widget()->id('time-6582f2d099e8b')->name('name')->render()
        );
    }

    public function testPrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            prefix
            <input id="time-6582f2d099e8b" type="time">
            HTML,
            Time::widget()->id('time-6582f2d099e8b')->prefix('prefix')->render()
        );
    }

    public function testPrefixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            prefix
            </div>
            <input id="time-6582f2d099e8b" type="time">
            HTML,
            Time::widget()->id('time-6582f2d099e8b')->prefix('prefix')->prefixContainer(true)->render()
        );
    }

    public function testPrefixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="class">
            prefix
            </div>
            <input id="time-6582f2d099e8b" type="time">
            HTML,
            Time::widget()
                ->id('time-6582f2d099e8b')
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
            <input id="time-6582f2d099e8b" type="time">
            HTML,
            Time::widget()
                ->id('time-6582f2d099e8b')
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
            <input id="time-6582f2d099e8b" type="time">
            HTML,
            Time::widget()
                ->id('time-6582f2d099e8b')
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
            <input id="time-6582f2d099e8b" type="time" readonly>
            HTML,
            Time::widget()->id('time-6582f2d099e8b')->readonly()->render()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="time-6582f2d099e8b" type="time">
            HTML,
            Time::widget()->id('time-6582f2d099e8b')->render()
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="time-6582f2d099e8b" type="time" style="style">
            HTML,
            Time::widget()->id('time-6582f2d099e8b')->style('style')->render()
        );
    }

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="time-6582f2d099e8b" type="time">
            suffix
            HTML,
            Time::widget()->id('time-6582f2d099e8b')->suffix('suffix')->render()
        );
    }

    public function testSuffixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="time-6582f2d099e8b" type="time">
            <div>
            suffix
            </div>
            HTML,
            Time::widget()->id('time-6582f2d099e8b')->suffix('suffix')->suffixContainer(true)->render()
        );
    }

    public function testSuffixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="time-6582f2d099e8b" type="time">
            <div class="class">
            suffix
            </div>
            HTML,
            Time::widget()
                ->id('time-6582f2d099e8b')
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
            <input id="time-6582f2d099e8b" type="time">
            <div class="class">
            suffix
            </div>
            HTML,
            Time::widget()
                ->id('time-6582f2d099e8b')
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
            <input id="time-6582f2d099e8b" type="time">
            <article>
            suffix
            </article>
            HTML,
            Time::widget()
                ->id('time-6582f2d099e8b')
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
            <input id="time-6582f2d099e8b" type="time" tabindex="1">
            HTML,
            Time::widget()->id('time-6582f2d099e8b')->tabIndex(1)->render()
        );
    }

    public function testTemplate(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="time-6582f2d099e8b" type="time">
            suffix
            HTML,
            Time::widget()
                ->id('time-6582f2d099e8b')
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
            <input id="time-6582f2d099e8b" type="time" title="title">
            HTML,
            Time::widget()->id('time-6582f2d099e8b')->title('title')->render()
        );
    }

    public function testValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="time-6582f2d099e8b" type="time" value="value">
            HTML,
            Time::widget()->id('time-6582f2d099e8b')->value('value')->render()
        );
    }

    public function testValueWithEmpty(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="time-6582f2d099e8b" type="time">
            HTML,
            Time::widget()->id('time-6582f2d099e8b')->value(null)->render()
        );
    }
}
