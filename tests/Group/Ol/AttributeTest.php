<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Group\Ol;

use PHPForge\Html\Group\{Li, Ol};
use PHPForge\Support\Assert;
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
            <ol class="value">
            </ol>
            HTML,
            Ol::widget()->attributes(['class' => 'value'])->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <ol class="value">
            </ol>
            HTML,
            Ol::widget()->attributes(['class' => 'value'])->render()
        );
    }

    public function testContent(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <ol>
            <li>
            Item 1
            </li>
            <li>
            Item 2
            </li>
            </ol>
            HTML,
            Ol::widget()->content(Li::widget()->content('Item 1'), Li::widget()->content('Item 2'))->render()
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <ol id="value">
            </ol>
            HTML,
            Ol::widget()->id('value')->render(),
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <ol lang="value">
            </ol>
            HTML,
            Ol::widget()->lang('value')->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <ol name="value">
            </ol>
            HTML,
            Ol::widget()->name('value')->render(),
        );
    }

    public function testReversed(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <ol reversed>
            </ol>
            HTML,
            Ol::widget()->reversed()->render(),
        );
    }

    public function testStart(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <ol start="1">
            </ol>
            HTML,
            Ol::widget()->start(1)->render(),
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <ol style="value">
            </ol>
            HTML,
            Ol::widget()->style('value')->render(),
        );
    }

    public function testTabIndex(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <ol tabindex="1">
            </ol>
            HTML,
            Ol::widget()->tabIndex(1)->render(),
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <ol title="value">
            </ol>
            HTML,
            Ol::widget()->title('value')->render(),
        );
    }

    public function testType(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <ol type="circle">
            <li>
            Item 1
            </li>
            <li>
            Item 2
            </li>
            </ol>
            HTML,
            Ol::widget()
                ->content(
                    Li::widget()->content('Item 1'),
                    Li::widget()->content('Item 2'),
                )
                ->type('circle')
                ->render(),
        );
    }
}
