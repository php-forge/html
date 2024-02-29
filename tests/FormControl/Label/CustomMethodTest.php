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

    public function testPrefixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            value
            </div>
            <label>value</label>
            HTML,
            Label::widget()->content('value')->prefixContainer(true)->prefix('value')->render()
        );
    }

    public function testPrefixContainerAttributes(): void
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
            <label>value</label>
            HTML,
            Label::widget()
                ->content('value')
                ->prefixContainer(true)
                ->prefix('value')
                ->prefixContainerClass('value')
                ->render()
        );
    }

    public function testPrefixContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span>value</span>
            <label>value</label>
            HTML,
            Label::widget()
                ->content('value')
                ->prefixContainer(true)
                ->prefix('value')
                ->prefixContainerTag('span')
                ->render()
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

    public function testSuffixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label>value</label>
            <div>
            value
            </div>
            HTML,
            Label::widget()->content('value')->suffixContainer(true)->suffix('value')->render()
        );
    }

    public function testSuffixContainerAttributes(): void
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
            <label>value</label>
            <div class="value">
            value
            </div>
            HTML,
            Label::widget()
                ->content('value')
                ->suffixContainer(true)
                ->suffix('value')
                ->suffixContainerClass('value')
                ->render()
        );
    }

    public function testSuffixContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label>value</label>
            <span>value</span>
            HTML,
            Label::widget()
                ->content('value')
                ->suffixContainer(true)
                ->suffix('value')
                ->suffixContainerTag('span')
                ->render()
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
