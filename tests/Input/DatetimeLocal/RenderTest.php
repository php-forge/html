<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\DatetimeLocal;

use PHPForge\Html\Input\DatetimeLocal;
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
            <input id="datetime-local-6582f2d099e8b" type="datetime-local" aria-describedby="MyWidget">
            HTML,
            DatetimeLocal::widget()->ariaDescribedBy('MyWidget')->id('datetime-local-6582f2d099e8b')->render()
        );
    }

    public function testAriaLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-local-6582f2d099e8b" type="datetime-local" aria-label="MyWidget">
            HTML,
            DatetimeLocal::widget()->ariaLabel('MyWidget')->id('datetime-local-6582f2d099e8b')->render()
        );
    }

    public function testAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="class" id="datetime-local-6582f2d099e8b" type="datetime-local">
            HTML,
            DatetimeLocal::widget()->attributes(['class' => 'class'])->id('datetime-local-6582f2d099e8b')->render()
        );
    }

    public function testAutofocus(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-local-6582f2d099e8b" type="datetime-local" autofocus>
            HTML,
            DatetimeLocal::widget()->autofocus()->id('datetime-local-6582f2d099e8b')->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="class" id="datetime-local-6582f2d099e8b" type="datetime-local">
            HTML,
            DatetimeLocal::widget()->class('class')->id('datetime-local-6582f2d099e8b')->render()
        );
    }

    public function testDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-local-6582f2d099e8b" type="datetime-local" data-test="data-value">
            HTML,
            DatetimeLocal::widget()
                ->dataAttributes(['test' => 'data-value'])
                ->id('datetime-local-6582f2d099e8b')
                ->render()
        );
    }

    public function testDisabled(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-local-6582f2d099e8b" type="datetime-local" disabled>
            HTML,
            DatetimeLocal::widget()->disabled()->id('datetime-local-6582f2d099e8b')->render()
        );
    }

    public function testForm(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-local-6582f2d099e8b" type="datetime-local" form="form">
            HTML,
            DatetimeLocal::widget()->form('form')->id('datetime-local-6582f2d099e8b')->render()
        );
    }

    public function testGenerateAriaDescribeBy(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-local-6582f2d099e8b" type="datetime-local" aria-describedby="datetime-local-6582f2d099e8b-help">
            HTML,
            DatetimeLocal::widget()->ariaDescribedBy()->id('datetime-local-6582f2d099e8b')->render()
        );
    }

    public function testGenerateAriaDescribeByWithFalse(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-local-6582f2d099e8b" type="datetime-local">
            HTML,
            DatetimeLocal::widget()->ariaDescribedBy(false)->id('datetime-local-6582f2d099e8b')->render()
        );
    }

    public function testHidden(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-local-6582f2d099e8b" type="datetime-local" hidden>
            HTML,
            DatetimeLocal::widget()->hidden()->id('datetime-local-6582f2d099e8b')->render()
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="id" type="datetime-local">
            HTML,
            DatetimeLocal::widget()->id('id')->render()
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-local-6582f2d099e8b" type="datetime-local" lang="en">
            HTML,
            DatetimeLocal::widget()->id('datetime-local-6582f2d099e8b')->lang('en')->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-local-6582f2d099e8b" name="name" type="datetime-local">
            HTML,
            DatetimeLocal::widget()->id('datetime-local-6582f2d099e8b')->name('name')->render()
        );
    }

    public function testPrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            prefix
            <input id="datetime-local-6582f2d099e8b" type="datetime-local">
            HTML,
            DatetimeLocal::widget()->id('datetime-local-6582f2d099e8b')->prefix('prefix')->render()
        );
    }

    public function testPrefixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            prefix
            </div>
            <input id="datetime-local-6582f2d099e8b" type="datetime-local">
            HTML,
            DatetimeLocal::widget()
                ->id('datetime-local-6582f2d099e8b')
                ->prefix('prefix')
                ->prefixContainer(true)
                ->render()
        );
    }

    public function testPrefixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="class">
            prefix
            </div>
            <input id="datetime-local-6582f2d099e8b" type="datetime-local">
            HTML,
            DatetimeLocal::widget()
                ->id('datetime-local-6582f2d099e8b')
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
            <input id="datetime-local-6582f2d099e8b" type="datetime-local">
            HTML,
            DatetimeLocal::widget()
                ->id('datetime-local-6582f2d099e8b')
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
            <input id="datetime-local-6582f2d099e8b" type="datetime-local">
            HTML,
            DatetimeLocal::widget()
                ->id('datetime-local-6582f2d099e8b')
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
            <input id="datetime-local-6582f2d099e8b" type="datetime-local" readonly>
            HTML,
            DatetimeLocal::widget()->id('datetime-local-6582f2d099e8b')->readonly()->render()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-local-6582f2d099e8b" type="datetime-local">
            HTML,
            DatetimeLocal::widget()->id('datetime-local-6582f2d099e8b')->render()
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-local-6582f2d099e8b" type="datetime-local" style="style">
            HTML,
            DatetimeLocal::widget()->id('datetime-local-6582f2d099e8b')->style('style')->render()
        );
    }

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-local-6582f2d099e8b" type="datetime-local">
            suffix
            HTML,
            DatetimeLocal::widget()->id('datetime-local-6582f2d099e8b')->suffix('suffix')->render()
        );
    }

    public function testSuffixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-local-6582f2d099e8b" type="datetime-local">
            <div>
            suffix
            </div>
            HTML,
            DatetimeLocal::widget()
                ->id('datetime-local-6582f2d099e8b')
                ->suffix('suffix')
                ->suffixContainer(true)
                ->render()
        );
    }

    public function testSuffixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-local-6582f2d099e8b" type="datetime-local">
            <div class="class">
            suffix
            </div>
            HTML,
            DatetimeLocal::widget()
                ->id('datetime-local-6582f2d099e8b')
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
            <input id="datetime-local-6582f2d099e8b" type="datetime-local">
            <div class="class">
            suffix
            </div>
            HTML,
            DatetimeLocal::widget()
                ->id('datetime-local-6582f2d099e8b')
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
            <input id="datetime-local-6582f2d099e8b" type="datetime-local">
            <article>
            suffix
            </article>
            HTML,
            DatetimeLocal::widget()
                ->id('datetime-local-6582f2d099e8b')
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
            <input id="datetime-local-6582f2d099e8b" type="datetime-local" tabindex="1">
            HTML,
            DatetimeLocal::widget()->id('datetime-local-6582f2d099e8b')->tabIndex(1)->render()
        );
    }

    public function testTemplate(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-local-6582f2d099e8b" type="datetime-local">
            suffix
            HTML,
            DatetimeLocal::widget()
                ->id('datetime-local-6582f2d099e8b')
                ->prefix('prefix')
                ->suffix('suffix')
                ->template('{tag}\n{suffix}')
                ->render()
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-local-6582f2d099e8b" type="datetime-local" title="title">
            HTML,
            DatetimeLocal::widget()->id('datetime-local-6582f2d099e8b')->title('title')->render()
        );
    }

    public function testValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-local-6582f2d099e8b" type="datetime-local" value="value">
            HTML,
            DatetimeLocal::widget()->id('datetime-local-6582f2d099e8b')->value('value')->render()
        );
    }

    public function testValueWithEmpty(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="datetime-local-6582f2d099e8b" type="datetime-local">
            HTML,
            DatetimeLocal::widget()->id('datetime-local-6582f2d099e8b')->value(null)->render()
        );
    }
}
