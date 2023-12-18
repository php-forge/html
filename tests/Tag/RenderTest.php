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
    public function testElement(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            test element
            </div>
            HTML,
            Tag::widget()->content('test element')->tagName('div')->render(),
        );
    }

    public function testPrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span>test prefix</span>
            <div>
            test element
            </div>
            HTML,
            Tag::widget()
                ->content('test element')
                ->prefix(Span::widget()->content('test prefix'))
                ->tagName('div')
                ->render(),
        );
    }

    public function testPrefixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <aside>
            <span>test prefix</span>
            </aside>
            <div>
            test element
            </div>
            HTML,
            Tag::widget()
                ->content('test element')
                ->prefix(Span::widget()->content('test prefix'))
                ->prefixContainer(true)
                ->prefixContainerTag('aside')
                ->tagName('div')
                ->render(),
        );
    }

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            test element
            </div>
            <span>test suffix</span>
            HTML,
            Tag::widget()
                ->content('test element')
                ->suffix(Span::widget()->content('test suffix'))
                ->tagName('div')
                ->render(),
        );
    }

    public function testSuffixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            test element
            </div>
            <aside>
            <span>test prefix</span>
            </aside>
            HTML,
            Tag::widget()
                ->content('test element')
                ->suffix(Span::widget()->content('test prefix'))
                ->suffixContainer(true)
                ->suffixContainerTag('aside')
                ->tagName('div')
                ->render(),
        );
    }
}
