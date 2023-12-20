<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input;

use PHPForge\Html\Input\Input;
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
            <input id="text-6582f2d099e8b" type="text" aria-describedby="MyWidget">
            HTML,
            Input::widget()->ariaDescribedBy('MyWidget')->id('text-6582f2d099e8b')->render()
        );
    }

    public function testAriaLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="text" aria-label="MyWidget">
            HTML,
            Input::widget()->ariaLabel('MyWidget')->id('text-6582f2d099e8b')->render()
        );
    }

    public function testAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="class" id="text-6582f2d099e8b" type="text">
            HTML,
            Input::widget()->attributes(['class' => 'class'])->id('text-6582f2d099e8b')->render()
        );
    }

    public function testAutofocus(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="text" autofocus>
            HTML,
            Input::widget()->autofocus()->id('text-6582f2d099e8b')->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="class" id="text-6582f2d099e8b" type="text">
            HTML,
            Input::widget()->class('class')->id('text-6582f2d099e8b')->render()
        );
    }

    public function testDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="text" data-test="data-value">
            HTML,
            Input::widget()->dataAttributes(['test' => 'data-value'])->id('text-6582f2d099e8b')->render()
        );
    }

    public function testDisabled(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="text" disabled>
            HTML,
            Input::widget()->disabled()->id('text-6582f2d099e8b')->render()
        );
    }

    public function testForm(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="text" form="form">
            HTML,
            Input::widget()->form('form')->id('text-6582f2d099e8b')->render()
        );
    }

    public function testHidden(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="text" hidden>
            HTML,
            Input::widget()->hidden()->id('text-6582f2d099e8b')->render()
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="id" type="text">
            HTML,
            Input::widget()->id('id')->render()
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="text" lang="en">
            HTML,
            Input::widget()->id('text-6582f2d099e8b')->lang('en')->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" name="name" type="text">
            HTML,
            Input::widget()->id('text-6582f2d099e8b')->name('name')->render()
        );
    }

    public function testPrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            prefix
            <input id="text-6582f2d099e8b" type="text">
            HTML,
            Input::widget()->id('text-6582f2d099e8b')->prefix('prefix')->render()
        );
    }

    public function testPrefixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            prefix
            </div>
            <input id="text-6582f2d099e8b" type="text">
            HTML,
            Input::widget()->id('text-6582f2d099e8b')->prefix('prefix')->prefixContainer(true)->render()
        );
    }

    public function testPrefixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="class">
            prefix
            </div>
            <input id="text-6582f2d099e8b" type="text">
            HTML,
            Input::widget()
                ->id('text-6582f2d099e8b')
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
            <input id="text-6582f2d099e8b" type="text">
            HTML,
            Input::widget()
                ->id('text-6582f2d099e8b')
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
            <input id="text-6582f2d099e8b" type="text">
            HTML,
            Input::widget()
                ->id('text-6582f2d099e8b')
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
            <input id="text-6582f2d099e8b" type="text" readonly>
            HTML,
            Input::widget()->id('text-6582f2d099e8b')->readonly()->render()
        );
    }

    public function testRequired(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="text" required>
            HTML,
            Input::widget()->id('text-6582f2d099e8b')->required()->render()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="text">
            HTML,
            Input::widget()->id('text-6582f2d099e8b')->render()
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="text" style="style">
            HTML,
            Input::widget()->id('text-6582f2d099e8b')->style('style')->render()
        );
    }

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="text">
            suffix
            HTML,
            Input::widget()->id('text-6582f2d099e8b')->suffix('suffix')->render()
        );
    }

    public function testSuffixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="text">
            <div>
            suffix
            </div>
            HTML,
            Input::widget()->id('text-6582f2d099e8b')->suffix('suffix')->suffixContainer(true)->render()
        );
    }

    public function testSuffixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="text">
            <div class="class">
            suffix
            </div>
            HTML,
            Input::widget()
                ->id('text-6582f2d099e8b')
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
            <input id="text-6582f2d099e8b" type="text">
            <div class="class">
            suffix
            </div>
            HTML,
            Input::widget()
                ->id('text-6582f2d099e8b')
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
            <input id="text-6582f2d099e8b" type="text">
            <article>
            suffix
            </article>
            HTML,
            Input::widget()
                ->id('text-6582f2d099e8b')
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
            <input id="text-6582f2d099e8b" type="text" tabindex="1">
            HTML,
            Input::widget()->id('text-6582f2d099e8b')->tabIndex(1)->render()
        );
    }

    public function testTemplate(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="text">
            suffix
            HTML,
            Input::widget()
                ->id('text-6582f2d099e8b')
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
            <input id="text-6582f2d099e8b" type="text" title="title">
            HTML,
            Input::widget()->id('text-6582f2d099e8b')->title('title')->render()
        );
    }

    public function testType(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="radio">
            HTML,
            Input::widget()->id('text-6582f2d099e8b')->type('radio')->render()
        );
    }

    public function testValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="text" value="value">
            HTML,
            Input::widget()->id('text-6582f2d099e8b')->value('value')->render()
        );
    }

    public function testValueWithEmpty(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="text">
            HTML,
            Input::widget()->id('text-6582f2d099e8b')->value(null)->render()
        );
    }
}
