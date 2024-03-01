<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Textual\Span;

use PHPForge\{Html\Textual\Span, Support\Assert};
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
            <span class="value"></span>
            HTML,
            Span::widget()->attributes(['class' => 'value'])->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span class="value"></span>
            HTML,
            Span::widget()->class('value')->render()
        );
    }

    public function testContent(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span>value</span>
            HTML,
            Span::widget()->content('value')->render()
        );
    }

    public function testDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span data-value="value"></span>
            HTML,
            Span::widget()->dataAttributes(['value' => 'value'])->render()
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span id="value"></span>
            HTML,
            Span::widget()->id('value')->render()
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span lang="value"></span>
            HTML,
            Span::widget()->lang('value')->render()
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span style="value"></span>
            HTML,
            Span::widget()->style('value')->render()
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span title="value"></span>
            HTML,
            Span::widget()->title('value')->render()
        );
    }
}
