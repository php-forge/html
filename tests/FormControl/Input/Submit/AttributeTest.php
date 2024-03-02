<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Submit;

use PHPForge\{Html\FormControl\Input\Submit, Support\Assert};
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
            <input id="submit-6582f2d099e8b" type="submit" aria-describedby="value">
            </div>
            HTML,
            Submit::widget()->ariaDescribedBy('value')->id('submit-6582f2d099e8b')->render()
        );
    }

    public function testAriaLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="submit-6582f2d099e8b" type="submit" aria-label="value">
            </div>
            HTML,
            Submit::widget()->ariaLabel('value')->id('submit-6582f2d099e8b')->render()
        );
    }

    public function testAttribute(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input class="value" id="submit-6582f2d099e8b" type="submit">
            </div>
            HTML,
            Submit::widget()->attributes([
                'class' => 'value',
            ])->id('submit-6582f2d099e8b')->render()
        );
    }

    public function testAutofocus(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="submit-6582f2d099e8b" type="submit" autofocus>
            </div>
            HTML,
            Submit::widget()->autofocus()->id('submit-6582f2d099e8b')->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input class="value" id="submit-6582f2d099e8b" type="submit">
            </div>
            HTML,
            Submit::widget()->class('value')->id('submit-6582f2d099e8b')->render()
        );
    }

    public function testDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="submit-6582f2d099e8b" type="submit" data-value="value">
            </div>
            HTML,
            Submit::widget()->dataAttributes([
                'value' => 'value',
            ])->id('submit-6582f2d099e8b')->render()
        );
    }

    public function testDisabled(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="submit-6582f2d099e8b" type="submit" disabled>
            </div>
            HTML,
            Submit::widget()->disabled()->id('submit-6582f2d099e8b')->render()
        );
    }

    public function testForm(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="submit-6582f2d099e8b" type="submit" form="form">
            </div>
            HTML,
            Submit::widget()->form('form')->id('submit-6582f2d099e8b')->render()
        );
    }

    public function testFormaction(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="submit-6582f2d099e8b" type="submit" formaction="value">
            </div>
            HTML,
            Submit::widget()->formaction('value')->id('submit-6582f2d099e8b')->render()
        );
    }

    public function testFormenctype(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="submit-6582f2d099e8b" type="submit" formenctype="text/plain">
            </div>
            HTML,
            Submit::widget()->formenctype('text/plain')->id('submit-6582f2d099e8b')->render()
        );
    }

    public function testFormmethod(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="submit-6582f2d099e8b" type="submit" formmethod="GET">
            </div>
            HTML,
            Submit::widget()->formmethod('GET')->id('submit-6582f2d099e8b')->render()
        );
    }

    public function testFormnovalidate(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="submit-6582f2d099e8b" type="submit" formnovalidate>
            </div>
            HTML,
            Submit::widget()->formnovalidate()->id('submit-6582f2d099e8b')->render()
        );
    }

    public function testFormtarget(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="submit-6582f2d099e8b" type="submit" formtarget="_blank">
            </div>
            HTML,
            Submit::widget()->formtarget('_blank')->id('submit-6582f2d099e8b')->render()
        );
    }

    public function testGenerateAriaDescribeBy(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="submit-6582f2d099e8b" type="submit" aria-describedby="submit-6582f2d099e8b-help">
            </div>
            HTML,
            Submit::widget()->ariaDescribedBy()->id('submit-6582f2d099e8b')->render()
        );
    }

    public function testGenerateAriaDescribeByWithFalse(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="submit-6582f2d099e8b" type="submit">
            </div>
            HTML,
            Submit::widget()->ariaDescribedBy(false)->id('submit-6582f2d099e8b')->render()
        );
    }

    public function testGenerateId(): void
    {
        $this->assertStringContainsString('id="submit-', Submit::widget()->render());
    }

    public function testGetValue(): void
    {
        $this->assertSame('value', Submit::widget()->value('value')->getValue());
    }

    public function testHidden(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="submit-6582f2d099e8b" type="submit" hidden>
            </div>
            HTML,
            Submit::widget()->hidden()->id('submit-6582f2d099e8b')->render()
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="id" type="submit">
            </div>
            HTML,
            Submit::widget()->id('id')->render()
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="submit-6582f2d099e8b" type="submit" lang="value">
            </div>
            HTML,
            Submit::widget()->id('submit-6582f2d099e8b')->lang('value')->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="submit-6582f2d099e8b" name="value" type="submit">
            </div>
            HTML,
            Submit::widget()->id('submit-6582f2d099e8b')->name('value')->render()
        );
    }

    public function testReadonly(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="submit-6582f2d099e8b" type="submit" readonly>
            </div>
            HTML,
            Submit::widget()->id('submit-6582f2d099e8b')->readonly()->render()
        );
    }

    public function style(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="submit-6582f2d099e8b" style="value" type="submit">
            </div>
            HTML,
            Submit::widget()->id('submit-6582f2d099e8b')->style('value')->render()
        );
    }

    public function testTabIndex(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="submit-6582f2d099e8b" type="submit" tabindex="1">
            </div>
            HTML,
            Submit::widget()->id('submit-6582f2d099e8b')->tabIndex(1)->render()
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="submit-6582f2d099e8b" type="submit" title="value">
            </div>
            HTML,
            Submit::widget()->id('submit-6582f2d099e8b')->title('value')->render()
        );
    }

    public function testValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="submit-6582f2d099e8b" type="submit" value="value">
            </div>
            HTML,
            Submit::widget()->id('submit-6582f2d099e8b')->value('value')->render()
        );
    }

    public function testValueWithNull(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="submit-6582f2d099e8b" type="submit">
            </div>
            HTML,
            Submit::widget()->id('submit-6582f2d099e8b')->value(null)->render()
        );
    }

    public function testWithoutId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input type="submit">
            </div>
            HTML,
            Submit::widget()->id(null)->render()
        );
    }

    public function testWithoutName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <input id="submit-6582f2d099e8b" type="submit">
            </div>
            HTML,
            Submit::widget()->id('submit-6582f2d099e8b')->name(null)->render()
        );
    }
}
