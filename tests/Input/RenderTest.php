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
            '<input class="test-class">',
            Input::widget()->attributes(['class' => 'test-class'])->render(),
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
}
