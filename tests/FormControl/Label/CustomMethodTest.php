<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Label;

use PHPForge\{Html\FormControl\Label, Support\Assert};
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class CustomMethodTest extends TestCase
{
    public function testPrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            value
            <label>value</label>
            HTML,
            Label::widget()->content('value')->prefix('value')->render()
        );
    }

    public function testPrefixAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            value
            </div>
            <label>value</label>
            HTML,
            Label::widget()
                ->content('value')
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
            <label>value</label>
            HTML,
            Label::widget()->content('value')->prefix('value')->prefixClass('value')->prefixTag('div')->render()
        );
    }

    public function testPrefixTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span>value</span>
            <label>value</label>
            HTML,
            Label::widget()->content('value')->prefix('value')->prefixTag('span')->render()
        );
    }

    public function testPrefixTagWithFalseValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            value
            <label>value</label>
            HTML,
            Label::widget()->content('value')->prefix('value')->prefixTag(false)->render()
        );
    }

    public function testRender(): void
    {
        $this->assertEmpty(Label::widget()->render());
    }

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label>value</label>
            value
            HTML,
            Label::widget()->content('value')->suffix('value')->render()
        );
    }

    public function testSuffixAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label>value</label>
            <div class="value">
            value
            </div>
            HTML,
            Label::widget()
                ->content('value')
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
            <label>value</label>
            <div class="value">
            value
            </div>
            HTML,
            Label::widget()->content('value')->suffix('value')->suffixClass('value')->suffixTag('div')->render()
        );
    }

    public function testSuffixTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label>value</label>
            <span>value</span>
            HTML,
            Label::widget()->content('value')->suffix('value')->suffixTag('span')->render()
        );
    }

    public function testSuffixTagWithFalseValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label>value</label>
            value
            HTML,
            Label::widget()->content('value')->suffix('value')->suffixTag(false)->render()
        );
    }

    public function testTemplate(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <label>value</label>
            </div>
            HTML,
            Label::widget()->content('value')->template('<div>\n{tag}\n</div>')->render()
        );
    }
}
