<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Tag;

use PHPForge\{Html\FormControl\Label, Html\Tag, Support\Assert};
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
            <span></span>
            HTML,
            Tag::widget()->prefix('value')->tagName('span')->render()
        );
    }

    public function testPrefixAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            value
            </div>
            <span></span>
            HTML,
            Tag::widget()
                ->prefix('value')
                ->prefixAttributes(['class' => 'value'])
                ->prefixTag('div')
                ->tagName('span')
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
            <span></span>
            HTML,
            Tag::widget()->prefix('value')->prefixClass('value')->prefixTag('div')->tagName('span')->render()
        );
    }

    public function testPrefixTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <p>
            value
            </p>
            <span></span>
            HTML,
            Tag::widget()->prefix('value')->prefixTag('p')->tagName('span')->render()
        );
    }

    public function testPrefixTagWithFalseValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            value
            <span></span>
            HTML,
            Tag::widget()->prefix('value')->prefixTag(false)->tagName('span')->render()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span></span>
            HTML,
            Tag::widget()->tagName('span')->render()
        );
    }

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span></span>
            value
            HTML,
            Tag::widget()->suffix('value')->tagName('span')->render()
        );
    }

    public function testSuffixAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span></span>
            <div class="value">
            value
            </div>
            HTML,
            Tag::widget()
                ->suffix('value')
                ->suffixAttributes(['class' => 'value'])
                ->suffixTag('div')
                ->tagName('span')
                ->render()
        );
    }

    public function testSuffixClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span></span>
            <div class="value">
            value
            </div>
            HTML,
            Tag::widget()->suffix('value')->suffixClass('value')->suffixTag('div')->tagName('span')->render()
        );
    }

    public function testSuffixTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span></span>
            <p>
            value
            </p>
            HTML,
            Tag::widget()->suffix('value')->suffixTag('p')->tagName('span')->render()
        );
    }

    public function testSuffixTagWithFalseValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span></span>
            value
            HTML,
            Tag::widget()->suffix('value')->suffixTag(false)->tagName('span')->render()
        );
    }

    public function testTagName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            </div>
            HTML,
            Tag::widget()->tagName('div')->render()
        );
    }

    public function testTemplate(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <img>
            <div>
            HTML,
            Tag::widget()->tagName('img')->template('<div>\n{tag}\n<div>')->render()
        );
    }

    public function testTokenValues(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label>Label:</label>
            <span></span>
            HTML,
            Tag::widget()
                ->template('{label}\n{tag}')
                ->tokenValues(['{label}' => Label::widget()->content('Label:')])
                ->tagName('span')
                ->render()
        );
    }
}
