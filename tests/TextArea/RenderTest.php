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
        $this->assertSame('<textarea autocomplete="on"></textarea>', TextArea::widget()->autocomplete('on')->render());
    }

    public function testAttributes(): void
    {
        $this->assertSame(
            '<textarea class="test-class"></textarea>',
            TextArea::widget()->attributes(['class' => 'test-class'])->render(),
        );
    }

    public function testClass(): void
    {
        $this->assertSame(
            '<textarea class="test-class"></textarea>',
            TextArea::widget()->class('test-class')->render(),
        );
    }

    public function testCols(): void
    {
        $this->assertSame('<textarea cols="1"></textarea>', TextArea::widget()->cols(1)->render());
    }

    public function testContent(): void
    {
        $this->assertSame('<textarea>test-content</textarea>', TextArea::widget()->content('test-content')->render());
    }

    public function testDirname(): void
    {
        $this->assertSame(
            '<textarea dirname="test-dirname"></textarea>',
            TextArea::widget()->dirname('test-dirname')->render(),
        );
    }

    public function testElement(): void
    {
        $this->assertSame('<textarea></textarea>', TextArea::widget()->render());
    }

    public function testId(): void
    {
        $this->assertSame('<textarea id="test-id"></textarea>', TextArea::widget()->id('test-id')->render());
    }

    public function testLang(): void
    {
        $this->assertSame('<textarea lang="test-lang"></textarea>', TextArea::widget()->lang('test-lang')->render());
    }

    public function testMaxLength(): void
    {
        $this->assertSame('<textarea maxlength="1"></textarea>', TextArea::widget()->maxLength(1)->render());
    }

    public function testMinLength(): void
    {
        $this->assertSame('<textarea minlength="1"></textarea>', TextArea::widget()->minLength(1)->render());
    }

    public function testName(): void
    {
        $this->assertSame('<textarea name="test-name"></textarea>', TextArea::widget()->name('test-name')->render());
    }

    public function testPlaceholder(): void
    {
        $this->assertSame(
            '<textarea placeholder="test-placeholder"></textarea>',
            TextArea::widget()->placeholder('test-placeholder')->render(),
        );
    }

    public function testPrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            test-prefix
            <textarea></textarea>
            HTML,
            TextArea::widget()->prefix('test-prefix')->render(),
        );
    }

    public function testRows(): void
    {
        $this->assertSame('<textarea rows="1"></textarea>', TextArea::widget()->rows(1)->render());
    }

    public function testStyle(): void
    {
        $this->assertSame(
            '<textarea style="color:red;"></textarea>',
            TextArea::widget()->style('color:red;')->render(),
        );
    }

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <textarea></textarea>
            test-suffix
            HTML,
            TextArea::widget()->suffix('test-suffix')->render(),
        );
    }

    public function testTabIndex(): void
    {
        $this->assertSame('<textarea tabindex="1"></textarea>', TextArea::widget()->tabIndex(1)->render());
    }

    public function testTemplate(): void
    {
        $this->assertSame(
            '<textarea></textarea>',
            TextArea::widget()->prefix('test-prefix')->suffix('test-suffix')->template('{tag}')->render(),
        );
    }

    public function testTitle(): void
    {
        $this->assertSame(
            '<textarea title="test-title"></textarea>',
            TextArea::widget()->title('test-title')->render(),
        );
    }

    public function testWrap(): void
    {
        $this->assertSame('<textarea wrap="hard"></textarea>', TextArea::widget()->wrap('hard')->render());
    }
}
