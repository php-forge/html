<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Label;

use PHPForge\Html\Label;
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
            value
            <label></label>
            HTML,
            Label::widget()->prefix('value')->render(),
        );
    }

    public function testPrefixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            value
            </div>
            <label></label>
            HTML,
            Label::widget()->prefixContainer(true)->prefix('value')->render(),
        );
    }

    public function testPrefixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            value
            </div>
            <label></label>
            HTML,
            Label::widget()
                ->prefixContainer(true)
                ->prefix('value')
                ->prefixContainerAttributes(['class' => 'value'])
                ->render(),
        );
    }

    public function testPrefixContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            value
            </div>
            <label></label>
            HTML,
            Label::widget()->prefixContainer(true)->prefix('value')->prefixContainerClass('value')->render(),
        );
    }

    public function testPrefixContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span>value</span>
            <label></label>
            HTML,
            Label::widget()->prefixContainer(true)->prefix('value')->prefixContainerTag('span')->render(),
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label></label>
            HTML,
            Label::widget()->render(),
        );
    }

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label></label>
            value
            HTML,
            Label::widget()->suffix('value')->render(),
        );
    }

    public function testSuffixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label></label>
            <div>
            value
            </div>
            HTML,
            Label::widget()->suffixContainer(true)->suffix('value')->render(),
        );
    }

    public function testSuffixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label></label>
            <div class="value">
            value
            </div>
            HTML,
            Label::widget()
                ->suffixContainer(true)
                ->suffix('value')
                ->suffixContainerAttributes(['class' => 'value'])
                ->render(),
        );
    }

    public function testSuffixContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label></label>
            <div class="value">
            value
            </div>
            HTML,
            Label::widget()->suffixContainer(true)->suffix('value')->suffixContainerClass('value')->render(),
        );
    }

    public function testSuffixContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label></label>
            <span>value</span>
            HTML,
            Label::widget()->suffixContainer(true)->suffix('value')->suffixContainerTag('span')->render(),
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
            Label::widget()->content('value')->template('<div>\n{tag}\n</div>')->render(),
        );
    }
}
