<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\TextArea;

use PHPForge\Html\TextArea;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class RenderTest extends TestCase
{
    public function testAutocomplete(): void
    {
        $this->assertSame(
            <<<HTML
            <textarea id="textarea-659fc6087e75b" autocomplete="on"></textarea>
            HTML,
            TextArea::widget()->autocomplete('on')->id('textarea-659fc6087e75b')->render()
        );
    }

    public function testAutofocus(): void
    {
        $this->assertSame(
            <<<HTML
            <textarea id="textarea-659fc6087e75b" autofocus></textarea>
            HTML,
            TextArea::widget()->autofocus()->id('textarea-659fc6087e75b')->render()
        );
    }

    public function testAttributes(): void
    {
        $this->assertSame(
            <<<HTML
            <textarea class="class" id="textarea-659fc6087e75b"></textarea>
            HTML,
            TextArea::widget()->attributes(['class' => 'class'])->id('textarea-659fc6087e75b')->render()
        );
    }

    public function testClass(): void
    {
        $this->assertSame(
            <<<HTML
            <textarea class="class" id="textarea-659fc6087e75b"></textarea>
            HTML,
            TextArea::widget()->class('class')->id('textarea-659fc6087e75b')->render()
        );
    }

    public function testCols(): void
    {
        $this->assertSame(
            <<<HTML
            <textarea id="textarea-659fc6087e75b" cols="1"></textarea>
            HTML,
            TextArea::widget()->cols(1)->id('textarea-659fc6087e75b')->render()
        );
    }

    public function testContent(): void
    {
        $this->assertSame(
            <<<HTML
            <textarea id="textarea-659fc6087e75b">content</textarea>
            HTML,
            TextArea::widget()->content('content')->id('textarea-659fc6087e75b')->render()
        );
    }

    public function testDirname(): void
    {
        $this->assertSame(
            <<<HTML
            <textarea id="textarea-659fc6087e75b" dirname="dirname"></textarea>
            HTML,
            TextArea::widget()->dirname('dirname')->id('textarea-659fc6087e75b')->render()
        );
    }

    public function testDisabled(): void
    {
        $this->assertSame(
            <<<HTML
            <textarea id="textarea-659fc6087e75b" disabled></textarea>
            HTML,
            TextArea::widget()->disabled()->id('textarea-659fc6087e75b')->render()
        );
    }

    public function testId(): void
    {
        $this->assertSame(
            <<<HTML
            <textarea id="id"></textarea>
            HTML,
            TextArea::widget()->id('id')->render()
        );
    }

    public function testLang(): void
    {
        $this->assertSame(
            <<<HTML
            <textarea id="textarea-659fc6087e75b" lang="lang"></textarea>
            HTML,
            TextArea::widget()->id('textarea-659fc6087e75b')->lang('lang')->render()
        );
    }

    public function testMaxLength(): void
    {
        $this->assertSame(
            <<<HTML
            <textarea id="textarea-659fc6087e75b" maxlength="1"></textarea>
            HTML,
            TextArea::widget()->id('textarea-659fc6087e75b')->maxLength(1)->render()
        );
    }

    public function testMinLength(): void
    {
        $this->assertSame(
            <<<HTML
            <textarea id="textarea-659fc6087e75b" minlength="1"></textarea>
            HTML,
            TextArea::widget()->id('textarea-659fc6087e75b')->minlength(1)->render()
        );
    }

    public function testName(): void
    {
        $this->assertSame(
            <<<HTML
            <textarea id="textarea-659fc6087e75b" name="name"></textarea>
            HTML,
            TextArea::widget()->id('textarea-659fc6087e75b')->name('name')->render()
        );
    }

    public function testPlaceholder(): void
    {
        $this->assertSame(
            <<<HTML
            <textarea id="textarea-659fc6087e75b" placeholder="placeholder"></textarea>
            HTML,
            TextArea::widget()->id('textarea-659fc6087e75b')->placeholder('placeholder')->render()
        );
    }

    public function testPrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            prefix
            <textarea id="textarea-659fc6087e75b"></textarea>
            HTML,
            TextArea::widget()->id('textarea-659fc6087e75b')->prefix('prefix')->render()
        );
    }

    public function testReadonly(): void
    {
        $this->assertSame(
            <<<HTML
            <textarea id="textarea-659fc6087e75b" readonly></textarea>
            HTML,
            TextArea::widget()->id('textarea-659fc6087e75b')->readonly()->render()
        );
    }

    public function testRequired(): void
    {
        $this->assertSame(
            <<<HTML
            <textarea id="textarea-659fc6087e75b" required></textarea>
            HTML,
            TextArea::widget()->id('textarea-659fc6087e75b')->required()->render()
        );
    }

    public function testRender(): void
    {
        $this->assertSame(
            <<<HTML
            <textarea id="textarea-659fc6087e75b"></textarea>
            HTML,
            TextArea::widget()->id('textarea-659fc6087e75b')->render()
        );
    }

    public function testRows(): void
    {
        $this->assertSame(
            <<<HTML
            <textarea id="textarea-659fc6087e75b" rows="1"></textarea>
            HTML,
            TextArea::widget()->id('textarea-659fc6087e75b')->rows(1)->render()
        );
    }

    public function testStyle(): void
    {
        $this->assertSame(
            <<<HTML
            <textarea id="textarea-659fc6087e75b" style="style;"></textarea>
            HTML,
            TextArea::widget()->id('textarea-659fc6087e75b')->style('style;')->render()
        );
    }

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <textarea id="textarea-659fc6087e75b"></textarea>
            suffix
            HTML,
            TextArea::widget()->id('textarea-659fc6087e75b')->suffix('suffix')->render()
        );
    }

    public function testTabIndex(): void
    {
        $this->assertSame(
            <<<HTML
            <textarea id="textarea-659fc6087e75b" tabindex="1"></textarea>
            HTML,
            TextArea::widget()->id('textarea-659fc6087e75b')->tabIndex(1)->render()
        );
    }

    public function testTemplate(): void
    {
        $this->assertSame(
            <<<HTML
            <textarea id="textarea-659fc6087e75b"></textarea>
            HTML,
            TextArea::widget()
                ->id('textarea-659fc6087e75b')
                ->prefix('prefix')
                ->suffix('suffix')
                ->template('{tag}')
                ->render()
        );
    }

    public function testTitle(): void
    {
        $this->assertSame(
            <<<HTML
            <textarea id="textarea-659fc6087e75b" title="test-title"></textarea>
            HTML,
            TextArea::widget()->id('textarea-659fc6087e75b')->title('test-title')->render()
        );
    }

    public function testWrap(): void
    {
        $this->assertSame(
            <<<HTML
            <textarea id="textarea-659fc6087e75b" wrap="hard"></textarea>
            HTML,
            TextArea::widget()->id('textarea-659fc6087e75b')->wrap('hard')->render()
        );
    }
}
