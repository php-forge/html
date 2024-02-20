<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\TextArea;

use PHPForge\Html\FormControl\TextArea;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class AttributeTest extends TestCase
{
    public function testAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <textarea class="value" id="textarea-659fc6087e75b"></textarea>
            HTML,
            TextArea::widget()->attributes(['class' => 'value'])->id('textarea-659fc6087e75b')->render()
        );
    }

    public function testAutocomplete(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <textarea id="textarea-659fc6087e75b" autocomplete="on"></textarea>
            HTML,
            TextArea::widget()->autocomplete('on')->id('textarea-659fc6087e75b')->render()
        );
    }

    public function testAutofocus(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <textarea id="textarea-659fc6087e75b" autofocus></textarea>
            HTML,
            TextArea::widget()->autofocus()->id('textarea-659fc6087e75b')->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <textarea class="value" id="textarea-659fc6087e75b"></textarea>
            HTML,
            TextArea::widget()->class('value')->id('textarea-659fc6087e75b')->render()
        );
    }

    public function testCols(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <textarea id="textarea-659fc6087e75b" cols="1"></textarea>
            HTML,
            TextArea::widget()->cols(1)->id('textarea-659fc6087e75b')->render()
        );
    }

    public function testContent(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <textarea id="textarea-659fc6087e75b">value</textarea>
            HTML,
            TextArea::widget()->content('value')->id('textarea-659fc6087e75b')->render()
        );
    }

    public function testDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <textarea id="textarea-659fc6087e75b" data-value="value"></textarea>
            HTML,
            TextArea::widget()->dataAttributes(['value' => 'value'])->id('textarea-659fc6087e75b')->render()
        );
    }

    public function testDirname(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <textarea id="textarea-659fc6087e75b" dirname="value"></textarea>
            HTML,
            TextArea::widget()->dirname('value')->id('textarea-659fc6087e75b')->render()
        );
    }

    public function testDisabled(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <textarea id="textarea-659fc6087e75b" disabled></textarea>
            HTML,
            TextArea::widget()->disabled()->id('textarea-659fc6087e75b')->render()
        );
    }

    public function testForm(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <textarea id="textarea-659fc6087e75b" form="value"></textarea>
            HTML,
            TextArea::widget()->form('value')->id('textarea-659fc6087e75b')->render()
        );
    }

    public function testGenerateId(): void
    {
        $this->assertStringContainsString('<textarea id="textarea-', TextArea::widget()->render());
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <textarea id="value"></textarea>
            HTML,
            TextArea::widget()->id('value')->render()
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <textarea id="textarea-659fc6087e75b" lang="value"></textarea>
            HTML,
            TextArea::widget()->id('textarea-659fc6087e75b')->lang('value')->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <textarea id="textarea-659fc6087e75b" name="value"></textarea>
            HTML,
            TextArea::widget()->id('textarea-659fc6087e75b')->name('value')->render()
        );
    }

    public function testPlaceholder(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <textarea id="textarea-659fc6087e75b" placeholder="value"></textarea>
            HTML,
            TextArea::widget()->id('textarea-659fc6087e75b')->placeholder('value')->render()
        );
    }

    public function testReadonly(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <textarea id="textarea-659fc6087e75b" readonly></textarea>
            HTML,
            TextArea::widget()->id('textarea-659fc6087e75b')->readonly()->render()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <textarea id="textarea-659fc6087e75b"></textarea>
            HTML,
            TextArea::widget()->id('textarea-659fc6087e75b')->render()
        );
    }

    public function testRows(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <textarea id="textarea-659fc6087e75b" rows="1"></textarea>
            HTML,
            TextArea::widget()->id('textarea-659fc6087e75b')->rows(1)->render()
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <textarea id="textarea-659fc6087e75b" style="value"></textarea>
            HTML,
            TextArea::widget()->id('textarea-659fc6087e75b')->style('value')->render()
        );
    }

    public function testTabIndex(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <textarea id="textarea-659fc6087e75b" tabindex="1"></textarea>
            HTML,
            TextArea::widget()->id('textarea-659fc6087e75b')->tabIndex(1)->render()
        );
    }

    public function testTemplate(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <textarea id="textarea-659fc6087e75b"></textarea>
            </div>
            HTML,
            TextArea::widget()->id('textarea-659fc6087e75b')->template('<div>\n{tag}\n</div>')->render()
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <textarea id="textarea-659fc6087e75b" title="test-title"></textarea>
            HTML,
            TextArea::widget()->id('textarea-659fc6087e75b')->title('test-title')->render()
        );
    }

    public function testWrap(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <textarea id="textarea-659fc6087e75b" wrap="hard"></textarea>
            HTML,
            TextArea::widget()->id('textarea-659fc6087e75b')->wrap('hard')->render()
        );
    }
}
