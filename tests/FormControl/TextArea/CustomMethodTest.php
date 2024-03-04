<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\TextArea;

use PHPForge\{Html\FormControl\TextArea, Support\Assert};
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class CustomMethodTest extends TestCase
{
    public function testFieldAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <textarea id="formmodelname-property" name="FormModelName[property]"></textarea>
            HTML,
            TextArea::widget()->fieldAttributes('FormModelName', 'property')->render()
        );
    }

    public function testPrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            value
            <textarea id="textarea-659fc6087e75b"></textarea>
            HTML,
            TextArea::widget()->id('textarea-659fc6087e75b')->prefix('value')->render()
        );
    }

    public function testPrefixAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            value
            </div>
            <textarea id="textarea-659fc6087e75b"></textarea>
            HTML,
            TextArea::widget()
                ->id('textarea-659fc6087e75b')
                ->prefix('value')
                ->prefixAttributes(['class' => 'value'])
                ->prefixTag('div')
                ->render()
        );
    }

    public function testPrefixClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            value
            </div>
            <textarea id="textarea-659fc6087e75b"></textarea>
            HTML,
            TextArea::widget()
                ->id('textarea-659fc6087e75b')
                ->prefix('value')
                ->prefixClass('value')
                ->prefixTag('div')
                ->render()
        );
    }

    public function testPrefixTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span>value</span>
            <textarea id="textarea-659fc6087e75b"></textarea>
            HTML,
            TextArea::widget()->id('textarea-659fc6087e75b')->prefix('value')->prefixTag('span')->render()
        );
    }

    public function testPrefixTagWithFalseValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            value
            <textarea id="textarea-659fc6087e75b"></textarea>
            HTML,
            TextArea::widget()->id('textarea-659fc6087e75b')->prefix('value')->prefixTag(false)->render()
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

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <textarea id="textarea-659fc6087e75b"></textarea>
            value
            HTML,
            TextArea::widget()->id('textarea-659fc6087e75b')->suffix('value')->render()
        );
    }

    public function testSuffixAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <textarea id="textarea-659fc6087e75b"></textarea>
            <div class="value">
            value
            </div>
            HTML,
            TextArea::widget()
                ->id('textarea-659fc6087e75b')
                ->suffix('value')
                ->suffixAttributes(['class' => 'value'])
                ->suffixTag('div')
                ->render()
        );
    }

    public function testSuffixClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <textarea id="textarea-659fc6087e75b"></textarea>
            <div class="value">
            value
            </div>
            HTML,
            TextArea::widget()
                ->id('textarea-659fc6087e75b')
                ->suffix('value')
                ->suffixClass('value')
                ->suffixTag('div')
                ->render()
        );
    }

    public function testSuffixTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <textarea id="textarea-659fc6087e75b"></textarea>
            <span>value</span>
            HTML,
            TextArea::widget()->id('textarea-659fc6087e75b')->suffix('value')->suffixTag('span')->render()
        );
    }

    public function testSuffixTagWithFalseValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <textarea id="textarea-659fc6087e75b"></textarea>
            value
            HTML,
            TextArea::widget()->id('textarea-659fc6087e75b')->suffix('value')->suffixTag(false)->render()
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
}
