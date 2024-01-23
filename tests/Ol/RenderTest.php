<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Ol;

use PHPForge\Html\Li;
use PHPForge\Html\Ol;
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
            <ol class="test-class">
            </ol>
            HTML,
            Ol::widget()->attributes([
                'class' => 'test-class',
            ])->render(),
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <ol class="test-class test-class-1">
            </ol>
            HTML,
            Ol::widget()->attributes([
                'class' => 'test-class',
            ])->class('test-class-1')->render(),
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
            Ol::widget()
                ->content(
                    Li::widget()->content('Item 1'),
                    Li::widget()->content('Item 2'),
                )
                ->render(),
        );
    }

    public function testElement(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <ol>
            </ol>
            HTML,
            Ol::widget()->render(),
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <ol id="test-id">
            </ol>
            HTML,
            Ol::widget()->id('test-id')->render(),
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <ol lang="en">
            </ol>
            HTML,
            Ol::widget()->lang('en')->render(),
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <ol name="test-name">
            </ol>
            HTML,
            Ol::widget()->name('test-name')->render(),
        );
    }

    public function testNested(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <ol>
            <li>
            Item 1
            <ol>
            <li>
            Item 1.1
            </li>
            <li>
            Item 1.2
            </li>
            </ol>
            </li>
            <li>
            Item 2
            </li>
            </ol>
            HTML,
            Ol::widget()
                ->content(
                    Li::widget()
                        ->content(
                            'Item 1',
                            Ol::widget()
                                ->content(
                                    Li::widget()->content('Item 1.1'),
                                    Li::widget()->content('Item 1.2'),
                                ),
                        ),
                    Li::widget()->content('Item 2'),
                )
                ->render(),
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <ol style="color:red;">
            </ol>
            HTML,
            Ol::widget()->style('color:red;')->render(),
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
            <ol title="test-title">
            </ol>
            HTML,
            Ol::widget()->title('test-title')->render(),
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
