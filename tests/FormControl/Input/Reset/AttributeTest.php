<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Reset;

use PHPForge\{Html\FormControl\Input\Reset, Support\Assert};
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
            <input id="reset-6582f2d099e8b" type="reset" aria-describedby="value">
            </div>
            HTML,
            Reset::widget()->ariaDescribedBy('value')->id('reset-6582f2d099e8b')->render()
        );
    }

    public function testAriaLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="reset-6582f2d099e8b" type="reset" aria-label="value">
            </div>
            HTML,
            Reset::widget()->ariaLabel('value')->id('reset-6582f2d099e8b')->render()
        );
    }

    public function testAttribute(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input class="value" id="reset-6582f2d099e8b" type="reset">
            </div>
            HTML,
            Reset::widget()->attributes([
                'class' => 'value',
            ])->id('reset-6582f2d099e8b')->render()
        );
    }

    public function testAutofocus(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="reset-6582f2d099e8b" type="reset" autofocus>
            </div>
            HTML,
            Reset::widget()->autofocus()->id('reset-6582f2d099e8b')->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input class="value" id="reset-6582f2d099e8b" type="reset">
            </div>
            HTML,
            Reset::widget()->class('value')->id('reset-6582f2d099e8b')->render()
        );
    }

    public function testDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="reset-6582f2d099e8b" type="reset" data-value="value">
            </div>
            HTML,
            Reset::widget()->dataAttributes([
                'value' => 'value',
            ])->id('reset-6582f2d099e8b')->render()
        );
    }

    public function testDisabled(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="reset-6582f2d099e8b" type="reset" disabled>
            </div>
            HTML,
            Reset::widget()->disabled()->id('reset-6582f2d099e8b')->render()
        );
    }

    public function testForm(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="reset-6582f2d099e8b" type="reset" form="form">
            </div>
            HTML,
            Reset::widget()->form('form')->id('reset-6582f2d099e8b')->render()
        );
    }

    public function testFormaction(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="reset-6582f2d099e8b" type="reset" formaction="value">
            </div>
            HTML,
            Reset::widget()->formaction('value')->id('reset-6582f2d099e8b')->render()
        );
    }

    public function testFormenctype(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="reset-6582f2d099e8b" type="reset" formenctype="text/plain">
            </div>
            HTML,
            Reset::widget()->formenctype('text/plain')->id('reset-6582f2d099e8b')->render()
        );
    }

    public function testFormmethod(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="reset-6582f2d099e8b" type="reset" formmethod="GET">
            </div>
            HTML,
            Reset::widget()->formmethod('GET')->id('reset-6582f2d099e8b')->render()
        );
    }

    public function testFormnovalidate(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="reset-6582f2d099e8b" type="reset" formnovalidate>
            </div>
            HTML,
            Reset::widget()->formnovalidate()->id('reset-6582f2d099e8b')->render()
        );
    }

    public function testFormtarget(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="reset-6582f2d099e8b" type="reset" formtarget="_blank">
            </div>
            HTML,
            Reset::widget()->formtarget('_blank')->id('reset-6582f2d099e8b')->render()
        );
    }

    public function testGenerateAriaDescribeBy(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="reset-6582f2d099e8b" type="reset" aria-describedby="reset-6582f2d099e8b-help">
            </div>
            HTML,
            Reset::widget()->ariaDescribedBy()->id('reset-6582f2d099e8b')->render()
        );
    }

    public function testGenerateAriaDescribeByWithFalse(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="reset-6582f2d099e8b" type="reset">
            </div>
            HTML,
            Reset::widget()->ariaDescribedBy(false)->id('reset-6582f2d099e8b')->render()
        );
    }

    public function testGenerateId(): void
    {
        $this->assertStringContainsString('id="reset-', Reset::widget()->render());
    }

    public function testGetValue(): void
    {
        $this->assertSame('value', Reset::widget()->value('value')->getValue());
    }

    public function testHidden(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="reset-6582f2d099e8b" type="reset" hidden>
            </div>
            HTML,
            Reset::widget()->hidden()->id('reset-6582f2d099e8b')->render()
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="id" type="reset">
            </div>
            HTML,
            Reset::widget()->id('id')->render()
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="reset-6582f2d099e8b" type="reset" lang="value">
            </div>
            HTML,
            Reset::widget()->id('reset-6582f2d099e8b')->lang('value')->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="reset-6582f2d099e8b" name="value" type="reset">
            </div>
            HTML,
            Reset::widget()->id('reset-6582f2d099e8b')->name('value')->render()
        );
    }

    public function testReadonly(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="reset-6582f2d099e8b" type="reset" readonly>
            </div>
            HTML,
            Reset::widget()->id('reset-6582f2d099e8b')->readonly()->render()
        );
    }

    public function style(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="reset-6582f2d099e8b" style="value" type="reset">
            </div>
            HTML,
            Reset::widget()->id('reset-6582f2d099e8b')->style('value')->render()
        );
    }

    public function testTabIndex(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="reset-6582f2d099e8b" type="reset" tabindex="1">
            </div>
            HTML,
            Reset::widget()->id('reset-6582f2d099e8b')->tabIndex(1)->render()
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="reset-6582f2d099e8b" type="reset" title="value">
            </div>
            HTML,
            Reset::widget()->id('reset-6582f2d099e8b')->title('value')->render()
        );
    }

    public function testValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="reset-6582f2d099e8b" type="reset" value="value">
            </div>
            HTML,
            Reset::widget()->id('reset-6582f2d099e8b')->value('value')->render()
        );
    }

    public function testValueWithNull(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="reset-6582f2d099e8b" type="reset">
            </div>
            HTML,
            Reset::widget()->id('reset-6582f2d099e8b')->value(null)->render()
        );
    }

    public function testWithoutId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input type="reset">
            </div>
            HTML,
            Reset::widget()->id(null)->render()
        );
    }

    public function testWithoutName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="reset-6582f2d099e8b" type="reset">
            </div>
            HTML,
            Reset::widget()->id('reset-6582f2d099e8b')->name(null)->render()
        );
    }
}
