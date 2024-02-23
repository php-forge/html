<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Textual\Span;

use PHPForge\{Html\Textual\Span, Support\Assert};
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class CustomMethodTest extends TestCase
{
    public function testPrefixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            value
            </div>
            <span></span>
            HTML,
            Span::widget()->prefix('value')->prefixContainer(true)->render()
        );
    }

    public function testPrefixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            value
            </div>
            <span></span>
            HTML,
            Span::widget()
                ->prefix('value')
                ->prefixContainer(true)
                ->prefixContainerAttributes(['class' => 'value'])
                ->render()
        );
    }

    public function testPrefixContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            value
            </div>
            <span></span>
            HTML,
            Span::widget()->prefix('value')->prefixContainer(true)->prefixContainerClass('value')->render()
        );
    }

    public function testPrefixContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            value
            </div>
            <span></span>
            HTML,
            Span::widget()->prefix('value')->prefixContainer(true)->prefixContainerTag('div')->render()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span></span>
            HTML,
            Span::widget()->render(),
        );
    }

    public function testTemplate(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <span>value</span>
            </div>
            HTML,
            Span::widget()->content('value')->template('<div>\n{tag}\n</div>')->render()
        );
    }
}
