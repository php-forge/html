<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input;

use PHPForge\Html\Input;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class RenderTest extends TestCase
{
    public function testAriaDescribedBy(): void
    {
        $this->assertSame(
            '<input aria-describedby="MyWidget">',
            Input::widget()->ariaDescribedBy('MyWidget')->render(),
        );
    }

    public function testAriaLabel(): void
    {
        $this->assertSame(
            '<input aria-label="MyWidget">',
            Input::widget()->ariaLabel('MyWidget')->render(),
        );
    }

    public function testAttributes(): void
    {
        $this->assertSame(
            '<input class="test-class" id="test-id">',
            Input::widget()->attributes(['class' => 'test-class', 'id' => 'test-id'])->render(),
        );
    }

    public function testAutofocus(): void
    {
        $this->assertSame(
            '<input autofocus>',
            Input::widget()->autofocus()->render(),
        );
    }

    public function testClass(): void
    {
        $this->assertSame(
            '<input class="test-class">',
            Input::widget()->class('test-class')->render(),
        );
    }

    public function testDataAttributes(): void
    {
        $this->assertSame(
            '<input data-test="test-value">',
            Input::widget()->dataAttributes(['test' => 'test-value'])->render(),
        );
    }

    public function testDisabled(): void
    {
        $this->assertSame(
            '<input disabled>',
            Input::widget()->disabled()->render(),
        );
    }

    public function testForm(): void
    {
        $this->assertSame(
            '<input form="test-form">',
            Input::widget()->form('test-form')->render(),
        );
    }

    public function testHidden(): void
    {
        $this->assertSame(
            '<input hidden>',
            Input::widget()->hidden()->render(),
        );
    }

    public function testId(): void
    {
        $this->assertSame(
            '<input id="test-id">',
            Input::widget()->id('test-id')->render(),
        );
    }

    public function testLang(): void
    {
        $this->assertSame(
            '<input lang="en">',
            Input::widget()->lang('en')->render(),
        );
    }

    public function testName(): void
    {
        $this->assertSame(
            '<input name="test-name">',
            Input::widget()->name('test-name')->render(),
        );
    }

    public function testPrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            prefix
            <input>
            HTML,
            Input::widget()->prefix('prefix')->render(),
        );
    }

    public function testPrefixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            prefix
            </div>
            <input>
            HTML,
            Input::widget()->prefix('prefix')->prefixContainer(true)->render(),
        );
    }

    public function testPrefixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="prefix-container">
            prefix
            </div>
            <input>
            HTML,
            Input::widget()
                ->prefix('prefix')
                ->prefixContainer(true)
                ->prefixContainerAttributes(['class' => 'prefix-container'])
                ->render(),
        );
    }

    public function testPrefixContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="prefix-container">
            prefix
            </div>
            <input>
            HTML,
            Input::widget()
                ->prefix('prefix')
                ->prefixContainer(true)
                ->prefixContainerClass('prefix-container')
                ->render(),
        );
    }

    public function testPrefixContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <article>
            prefix
            </article>
            <input>
            HTML,
            Input::widget()
                ->prefix('prefix')
                ->prefixContainer(true)
                ->prefixContainerTag('article')
                ->render(),
        );
    }

    public function testPrefixAndTypeCheckbox(): void
    {
        $this->assertSame(
            'prefix<input type="checkbox">',
            Input::widget()->prefix('prefix')->type('checkbox')->render(),
        );
    }

    public function testPrefixAndTypeRadio(): void
    {
        $this->assertSame(
            'prefix<input type="radio">',
            Input::widget()->prefix('prefix')->type('radio')->render(),
        );
    }

    public function testReadonly(): void
    {
        $this->assertSame(
            '<input readonly>',
            Input::widget()->readonly()->render(),
        );
    }

    public function testRequired(): void
    {
        $this->assertSame(
            '<input required>',
            Input::widget()->required()->render(),
        );
    }

    public function testStyle(): void
    {
        $this->assertSame(
            '<input style="color:red;">',
            Input::widget()->style('color:red;')->render(),
        );
    }

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input>
            suffix
            HTML,
            Input::widget()->suffix('suffix')->render(),
        );
    }

    public function testSuffixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input>
            <div>
            suffix
            </div>
            HTML,
            Input::widget()->suffix('suffix')->suffixContainer(true)->render(),
        );
    }

    public function testSuffixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input>
            <div class="suffix-container">
            suffix
            </div>
            HTML,
            Input::widget()
                ->suffix('suffix')
                ->suffixContainer(true)
                ->suffixContainerAttributes(['class' => 'suffix-container'])
                ->render(),
        );
    }

    public function testSuffixContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input>
            <div class="suffix-container">
            suffix
            </div>
            HTML,
            Input::widget()
                ->suffix('suffix')
                ->suffixContainer(true)
                ->suffixContainerClass('suffix-container')
                ->render(),
        );
    }

    public function testSuffixContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input>
            <article>
            suffix
            </article>
            HTML,
            Input::widget()
                ->suffix('suffix')
                ->suffixContainer(true)
                ->suffixContainerTag('article')
                ->render(),
        );
    }

    public function testSuffixAndTypeCheckbox(): void
    {
        $this->assertSame(
            '<input type="checkbox">suffix',
            Input::widget()->suffix('suffix')->type('checkbox')->render(),
        );
    }

    public function testSuffixAndTypeRadio(): void
    {
        $this->assertSame(
            '<input type="radio">suffix',
            Input::widget()->suffix('suffix')->type('radio')->render(),
        );
    }

    public function testTabIndex(): void
    {
        $this->assertSame(
            '<input tabindex="1">',
            Input::widget()->tabIndex(1)->render(),
        );
    }

    public function testTemplate(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input>
            suffix
            HTML,
            Input::widget()->prefix('prefix')->suffix('suffix')->template('{tag}{suffix}')->render(),
        );
    }

    public function testTitle(): void
    {
        $this->assertSame(
            '<input title="test-title">',
            Input::widget()->title('test-title')->render(),
        );
    }

    public function testType(): void
    {
        $this->assertSame(
            '<input type="radio">',
            Input::widget()->type('radio')->render(),
        );
    }

    public function testValue(): void
    {
        $this->assertSame(
            '<input value="test-value">',
            Input::widget()->value('test-value')->render(),
        );
    }

    public function testValueEmpty(): void
    {
        $this->assertSame(
            '<input>',
            Input::widget()->value('')->render(),
        );
    }
}
