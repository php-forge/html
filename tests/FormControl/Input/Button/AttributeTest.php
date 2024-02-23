<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Button;

use PHPForge\{Html\FormControl\Input\Button, Support\Assert};
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class AttributeTest extends TestCase
{
    public function testAriaDescribedBy(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="button-6582f2d099e8b" type="button" aria-describedby="value">
            </div>
            HTML,
            Button::widget()->ariaDescribedBy('value')->id('button-6582f2d099e8b')->render()
        );
    }

    public function testAriaLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="button-6582f2d099e8b" type="button" aria-label="value">
            </div>
            HTML,
            Button::widget()->ariaLabel('value')->id('button-6582f2d099e8b')->render()
        );
    }

    public function testAttribute(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input class="value" id="button-6582f2d099e8b" type="button">
            </div>
            HTML,
            Button::widget()->attributes(['class' => 'value'])->id('button-6582f2d099e8b')->render()
        );
    }

    public function testAutofocus(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="button-6582f2d099e8b" type="button" autofocus>
            </div>
            HTML,
            Button::widget()->autofocus()->id('button-6582f2d099e8b')->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input class="value" id="button-6582f2d099e8b" type="button">
            </div>
            HTML,
            Button::widget()->class('value')->id('button-6582f2d099e8b')->render()
        );
    }

    public function testDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="button-6582f2d099e8b" type="button" data-value="value">
            </div>
            HTML,
            Button::widget()->dataAttributes(['value' => 'value'])->id('button-6582f2d099e8b')->render()
        );
    }

    public function testDisabled(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="button-6582f2d099e8b" type="button" disabled>
            </div>
            HTML,
            Button::widget()->disabled()->id('button-6582f2d099e8b')->render()
        );
    }

    public function testForm(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="button-6582f2d099e8b" type="button" form="form">
            </div>
            HTML,
            Button::widget()->form('form')->id('button-6582f2d099e8b')->render()
        );
    }

    public function testGenerateAriaDescribeBy(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="button-6582f2d099e8b" type="button" aria-describedby="button-6582f2d099e8b-help">
            </div>
            HTML,
            Button::widget()->ariaDescribedBy()->id('button-6582f2d099e8b')->render()
        );
    }

    public function testGenerateAriaDescribeByWithFalse(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="button-6582f2d099e8b" type="button">
            </div>
            HTML,
            Button::widget()->ariaDescribedBy(false)->id('button-6582f2d099e8b')->render()
        );
    }

    public function testGenerateId(): void
    {
        $this->assertStringContainsString('id="button-', Button::widget()->render());
    }

    public function testGetValue(): void
    {
        $this->assertSame('value', Button::widget()->value('value')->getValue());
    }

    public function testHidden(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="button-6582f2d099e8b" type="button" hidden>
            </div>
            HTML,
            Button::widget()->hidden()->id('button-6582f2d099e8b')->render()
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="id" type="button">
            </div>
            HTML,
            Button::widget()->id('id')->render()
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="button-6582f2d099e8b" type="button" lang="value">
            </div>
            HTML,
            Button::widget()->id('button-6582f2d099e8b')->lang('value')->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="button-6582f2d099e8b" name="value" type="button">
            </div>
            HTML,
            Button::widget()->id('button-6582f2d099e8b')->name('value')->render()
        );
    }

    public function testReadonly(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="button-6582f2d099e8b" type="button" readonly>
            </div>
            HTML,
            Button::widget()->id('button-6582f2d099e8b')->readonly()->render()
        );
    }

    public function style(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="button-6582f2d099e8b" style="value" type="button">
            </div>
            HTML,
            Button::widget()->id('button-6582f2d099e8b')->style('value')->render()
        );
    }

    public function testTabIndex(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="button-6582f2d099e8b" type="button" tabindex="1">
            </div>
            HTML,
            Button::widget()->id('button-6582f2d099e8b')->tabIndex(1)->render()
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="button-6582f2d099e8b" type="button" title="value">
            </div>
            HTML,
            Button::widget()->id('button-6582f2d099e8b')->title('value')->render()
        );
    }

    public function testValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="button-6582f2d099e8b" type="button" value="value">
            </div>
            HTML,
            Button::widget()->id('button-6582f2d099e8b')->value('value')->render()
        );
    }

    public function testValueWithNull(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="button-6582f2d099e8b" type="button">
            </div>
            HTML,
            Button::widget()->id('button-6582f2d099e8b')->value(null)->render()
        );
    }

    public function testWithoutId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input type="button">
            </div>
            HTML,
            Button::widget()->id(null)->render()
        );
    }

    public function testWithoutName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="button-6582f2d099e8b" type="button">
            </div>
            HTML,
            Button::widget()->id('button-6582f2d099e8b')->name(null)->render()
        );
    }
}
