<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\Text;

use PHPForge\Html\Input\Text;
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
            Text::widget()->ariaDescribedBy('MyWidget')->id('text-6582f2d099e8b')->render()
        );
    }

    public function testAriaLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="text" aria-label="MyWidget">
            HTML,
            Text::widget()->ariaLabel('MyWidget')->id('text-6582f2d099e8b')->render()
        );
    }

    public function testAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="class" id="text-6582f2d099e8b" type="text">
            HTML,
            Text::widget()->attributes(['class' => 'class'])->id('text-6582f2d099e8b')->render()
        );
    }

    public function testAutofocus(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="text" autofocus>
            HTML,
            Text::widget()->autofocus()->id('text-6582f2d099e8b')->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="class" id="text-6582f2d099e8b" type="text">
            HTML,
            Text::widget()->class('class')->id('text-6582f2d099e8b')->render()
        );
    }

    public function testDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="text" data-test="data-value">
            HTML,
            Text::widget()->dataAttributes(['test' => 'data-value'])->id('text-6582f2d099e8b')->render()
        );
    }

    public function testDirname(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="text" dirname="dirname">
            HTML,
            Text::widget()->id('text-6582f2d099e8b')->dirname('dirname')->render()
        );
    }

    public function testDisabled(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="text" disabled>
            HTML,
            Text::widget()->disabled()->id('text-6582f2d099e8b')->render()
        );
    }

    public function testForm(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="text" form="form">
            HTML,
            Text::widget()->form('form')->id('text-6582f2d099e8b')->render()
        );
    }

    public function testGenerateAriaDescribeBy(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="text" aria-describedby="text-6582f2d099e8b-help">
            HTML,
            Text::widget()->ariaDescribedBy()->id('text-6582f2d099e8b')->render()
        );
    }

    public function testGenerateAriaDescribeByWithFalse(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="text">
            HTML,
            Text::widget()->ariaDescribedBy(false)->id('text-6582f2d099e8b')->render()
        );
    }

    public function testHidden(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="text" hidden>
            HTML,
            Text::widget()->hidden()->id('text-6582f2d099e8b')->render()
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="id" type="text">
            HTML,
            Text::widget()->id('id')->render()
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="text" lang="en">
            HTML,
            Text::widget()->id('text-6582f2d099e8b')->lang('en')->render()
        );
    }

    public function testMaxLength(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="text" maxlength="1">
            HTML,
            Text::widget()->id('text-6582f2d099e8b')->maxlength(1)->render()
        );
    }

    public function testMinLength(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="text" minlength="1">
            HTML,
            Text::widget()->id('text-6582f2d099e8b')->minlength(1)->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" name="name" type="text">
            HTML,
            Text::widget()->id('text-6582f2d099e8b')->name('name')->render()
        );
    }

    public function testPattern(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="text" pattern="pattern">
            HTML,
            Text::widget()->id('text-6582f2d099e8b')->pattern('pattern')->render()
        );
    }

    public function testPlaceholder(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="text" placeholder="placeholder">
            HTML,
            Text::widget()->id('text-6582f2d099e8b')->placeholder('placeholder')->render()
        );
    }

    public function testPrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            prefix
            <input id="text-6582f2d099e8b" type="text">
            HTML,
            Text::widget()->id('text-6582f2d099e8b')->prefix('prefix')->render()
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
            Text::widget()->id('text-6582f2d099e8b')->prefix('prefix')->prefixContainer(true)->render()
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
            Text::widget()
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
            Text::widget()
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
            Text::widget()
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
            Text::widget()->id('text-6582f2d099e8b')->readonly()->render()
        );
    }

    public function testRequired(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="text" required>
            HTML,
            Text::widget()->id('text-6582f2d099e8b')->required()->render()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="text">
            HTML,
            Text::widget()->id('text-6582f2d099e8b')->render()
        );
    }

    public function testSize(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="text" size="1">
            HTML,
            Text::widget()->id('text-6582f2d099e8b')->size(1)->render()
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="text" style="style">
            HTML,
            Text::widget()->id('text-6582f2d099e8b')->style('style')->render()
        );
    }

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="text">
            suffix
            HTML,
            Text::widget()->id('text-6582f2d099e8b')->suffix('suffix')->render()
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
            Text::widget()->id('text-6582f2d099e8b')->suffix('suffix')->suffixContainer(true)->render()
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
            Text::widget()
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
            Text::widget()
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
            Text::widget()
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
            Text::widget()->id('text-6582f2d099e8b')->tabIndex(1)->render()
        );
    }

    public function testTemplate(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="text">
            suffix
            HTML,
            Text::widget()
                ->id('text-6582f2d099e8b')
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
            <input id="text-6582f2d099e8b" type="text" title="title">
            HTML,
            Text::widget()->id('text-6582f2d099e8b')->title('title')->render()
        );
    }

    public function testValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="text" value="value">
            HTML,
            Text::widget()->id('text-6582f2d099e8b')->value('value')->render()
        );
    }

    public function testValueWithEmpty(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="text">
            HTML,
            Text::widget()->id('text-6582f2d099e8b')->value(null)->render()
        );
    }
}
