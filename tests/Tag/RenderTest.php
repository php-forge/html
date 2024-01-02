<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Tag;

use PHPForge\Html\Span;
use PHPForge\Html\Tag;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class RenderTest extends TestCase
{
    public function testAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="id" type="type">
            element
            </div>
            HTML,
            Tag::widget()->attributes(['id' => 'id', 'type' => 'type'])->content('element')->tagName('div')->render()
        );
    }
    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div id="id">
            element
            </div>
            HTML,
            Tag::widget()->content('element')->id('id')->tagName('div')->render()
        );
    }

    public function testPrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span>prefix</span>
            <div>
            element
            </div>
            HTML,
            Tag::widget()->content('element')->prefix(Span::widget()->content('prefix'))->tagName('div')->render()
        );
    }

    public function testPrefixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <aside>
            <span>prefix</span>
            </aside>
            <div>
            element
            </div>
            HTML,
            Tag::widget()
                ->content('element')
                ->prefix(Span::widget()->content('prefix'))
                ->prefixContainer(true)
                ->prefixContainerTag('aside')
                ->tagName('div')
                ->render()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            element
            </div>
            HTML,
            Tag::widget()->content('element')->tagName('div')->render()
        );
    }

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            element
            </div>
            <span>suffix</span>
            HTML,
            Tag::widget()->content('element')->suffix(Span::widget()->content('suffix'))->tagName('div')->render()
        );
    }

    public function testSuffixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            element
            </div>
            <aside>
            <span>prefix</span>
            </aside>
            HTML,
            Tag::widget()
                ->content('element')
                ->suffix(Span::widget()->content('prefix'))
                ->suffixContainer(true)
                ->suffixContainerTag('aside')
                ->tagName('div')
                ->render()
        );
    }

    public function testType(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div type="type">
            element
            </div>
            HTML,
            Tag::widget()->content('element')->tagName('div')->type('type')->render()
        );
    }
}
