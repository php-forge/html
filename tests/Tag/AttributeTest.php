<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Tag;

use PHPForge\{Html\Svg, Support\Assert};
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
            <span id="value"></span>
            HTML,
            Tag::widget()->attributes(['id' => 'value'])->tagName('span')->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span class="value"></span>
            HTML,
            Tag::widget()->class('value')->tagName('span')->render()
        );
    }

    public function testContent(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span>content</span>
            HTML,
            Tag::widget()->content('content')->tagName('span')->render()
        );
    }

    public function testDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span data-value="value"></span>
            HTML,
            Tag::widget()->dataAttributes(['value' => 'value'])->tagName('span')->render()
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span id="value"></span>
            HTML,
            Tag::widget()->id('value')->tagName('span')->render()
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span lang="value"></span>
            HTML,
            Tag::widget()->lang('value')->tagName('span')->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span name="value"></span>
            HTML,
            Tag::widget()->name('value')->tagName('span')->render()
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span style="value"></span>
            HTML,
            Tag::widget()->style('value')->tagName('span')->render()
        );
    }

    public function testTabindex(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span tabindex="1"></span>
            HTML,
            Tag::widget()->tabindex(1)->tagName('span')->render()
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span title="value"></span>
            HTML,
            Tag::widget()->title('value')->tagName('span')->render()
        );
    }

    public function testType(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button type="button"></button>
            HTML,
            Tag::widget()->tagName('button')->type('button')->render()
        );
    }

    public function testValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input value="value">
            HTML,
            Tag::widget()->tagName('input')->value('value')->render()
        );
    }
}
