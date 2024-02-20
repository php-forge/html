<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Tag;

use PHPForge\Html\FormControl\Label;
use PHPForge\Html\Tag;
use PHPForge\Support\Assert;
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
            prefix
            <span></span>
            HTML,
            Tag::widget()->prefix('prefix')->tagName('span')->render()
        );
    }

    public function testPrefixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            prefix
            </div>
            <span></span>
            HTML,
            Tag::widget()->prefix('prefix')->prefixContainer(true)->tagName('span')->render()
        );
    }

    public function testPrefixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            prefix
            </div>
            <span></span>
            HTML,
            Tag::widget()
                ->prefix('prefix')
                ->prefixContainer(true)
                ->prefixContainerAttributes(['class' => 'value'])
                ->tagName('span')
                ->render()
        );
    }

    public function testPrefixContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            prefix
            </div>
            <span></span>
            HTML,
            Tag::widget()
                ->prefix('prefix')
                ->prefixContainer(true)
                ->prefixContainerClass('value')
                ->tagName('span')
                ->render()
        );
    }

    public function testPrefixContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <p>
            prefix
            </p>
            <span></span>
            HTML,
            Tag::widget()
                ->prefix('prefix')
                ->prefixContainer(true)
                ->prefixContainerTag('p')
                ->tagName('span')
                ->render()
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
            suffix
            HTML,
            Tag::widget()->suffix('suffix')->tagName('span')->render()
        );
    }

    public function testSuffixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span></span>
            <div>
            suffix
            </div>
            HTML,
            Tag::widget()->suffix('suffix')->suffixContainer(true)->tagName('span')->render()
        );
    }

    public function testSuffixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span></span>
            <div class="value">
            suffix
            </div>
            HTML,
            Tag::widget()
                ->suffix('suffix')
                ->suffixContainer(true)
                ->suffixContainerAttributes(['class' => 'value'])
                ->tagName('span')
                ->render()
        );
    }

    public function testSuffixContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span></span>
            <div class="value">
            suffix
            </div>
            HTML,
            Tag::widget()
                ->suffix('suffix')
                ->suffixContainer(true)
                ->suffixContainerClass('value')
                ->tagName('span')
                ->render()
        );
    }

    public function testSuffixContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span></span>
            <p>
            suffix
            </p>
            HTML,
            Tag::widget()
                ->suffix('suffix')
                ->suffixContainer(true)
                ->suffixContainerTag('p')
                ->tagName('span')
                ->render()
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
