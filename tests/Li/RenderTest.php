<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Li;

use PHPForge\Html\Li;
use PHPForge\Html\Ul;
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
            <li class="test-class">
            </li>
            HTML,
            Li::widget()->attributes([
                'class' => 'test-class',
            ])->render(),
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <li class="test-class test-class-1">
            </li>
            HTML,
            Li::widget()->attributes([
                'class' => 'test-class',
            ])->class('test-class-1')->render(),
        );
    }

    public function testContent(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <li>
            Item 1
            </li>
            HTML,
            Li::widget()->content('Item 1')->render(),
        );
    }

    public function testElement(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <li>
            </li>
            HTML,
            Li::widget()->render(),
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <li id="test-id">
            </li>
            HTML,
            Li::widget()->id('test-id')->render(),
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <li lang="en">
            </li>
            HTML,
            Li::widget()->lang('en')->render(),
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <li name="test-name">
            </li>
            HTML,
            Li::widget()->name('test-name')->render(),
        );
    }

    public function testNested(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <li>
            <ul>
            <li>
            Item 1
            </li>
            <li>
            Item 2
            </li>
            </ul>
            </li>
            HTML,
            Li::widget()
                ->content(
                    Ul::widget()
                        ->content(
                            Li::widget()->content('Item 1'),
                            Li::widget()->content('Item 2'),
                        )
                )
                ->render(),
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <li style="color:red;">
            </li>
            HTML,
            Li::widget()->style('color:red;')->render(),
        );
    }

    public function testTabIndex(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <li tabindex="1">
            </li>
            HTML,
            Li::widget()->tabIndex(1)->render(),
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <li title="test-title">
            </li>
            HTML,
            Li::widget()->title('test-title')->render(),
        );
    }

    public function testValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <li value="1">
            </li>
            HTML,
            Li::widget()->value(1)->render(),
        );
    }
}
