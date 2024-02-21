<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Textual\A;

use PHPForge\Html\Textual\A;
use PHPForge\Support\Assert;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class CustomMethodTest extends \PHPUnit\Framework\TestCase
{
    public function testPrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            value
            <a></a>
            HTML,
            A::widget()->prefix('value')->render()
        );
    }

    public function testPrefixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            value
            </div>
            <a></a>
            HTML,
            A::widget()->prefixContainer(true)->prefix('value')->render()
        );
    }

    public function testPrefixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            value
            </div>
            <a></a>
            HTML,
            A::widget()
                ->prefixContainer(true)
                ->prefix('value')
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
            <a></a>
            HTML,
            A::widget()->prefixContainer(true)->prefix('value')->prefixContainerClass('value')->render()
        );
    }

    public function testPrefixContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span>value</span>
            <a></a>
            HTML,
            A::widget()->prefixContainer(true)->prefix('value')->prefixContainerTag('span')->render()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a></a>
            HTML,
            A::widget()->render()
        );
    }

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a></a>
            value
            HTML,
            A::widget()->suffix('value')->render()
        );
    }

    public function testSuffixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a></a>
            <div>
            value
            </div>
            HTML,
            A::widget()->suffixContainer(true)->suffix('value')->render()
        );
    }

    public function testSuffixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a></a>
            <div class="value">
            value
            </div>
            HTML,
            A::widget()
                ->suffixContainer(true)
                ->suffix('value')
                ->suffixContainerAttributes(['class' => 'value'])
                ->render()
        );
    }

    public function testSuffixContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a></a>
            <div class="value">
            value
            </div>
            HTML,
            A::widget()->suffixContainer(true)->suffix('value')->suffixContainerClass('value')->render()
        );
    }

    public function testSuffixContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a></a>
            <span>value</span>
            HTML,
            A::widget()->suffixContainer(true)->suffix('value')->suffixContainerTag('span')->render()
        );
    }

    public function testTemplate(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <a>value</a>
            </div>
            HTML,
            A::widget()->content('value')->template('<div>\n{tag}\n</div>')->render()
        );
    }
}
