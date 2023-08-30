<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Ul;

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
            <ul class="test-class">
            </ul>
            HTML,
            Ul::widget()->attributes(['class' => 'test-class'])->render(),
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <ul class="test-class test-class-1">
            </ul>
            HTML,
            Ul::widget()->attributes(['class' => 'test-class'])->class('test-class-1')->render(),
        );
    }

    public function testContent(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <ul>
            <li>
            Item 1
            </li>
            <li>
            Item 2
            </li>
            </ul>
            HTML,
            Ul::widget()
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
            <ul>
            </ul>
            HTML,
            Ul::widget()->render(),
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <ul id="test-id">
            </ul>
            HTML,
            Ul::widget()->id('test-id')->render(),
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <ul lang="en">
            </ul>
            HTML,
            Ul::widget()->lang('en')->render(),
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <ul name="test-name">
            </ul>
            HTML,
            Ul::widget()->name('test-name')->render(),
        );
    }

    public function testNested(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <ul>
            <li>
            Item 1
            <ul>
            <li>
            Item 1.1
            </li>
            <li>
            Item 1.2
            </li>
            </ul>
            </li>
            <li>
            Item 2
            </li>
            </ul>
            HTML,
            Ul::widget()
                ->content(
                    Li::widget()
                        ->content(
                            'Item 1',
                            Ul::widget()
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
            <ul style="color:red;">
            </ul>
            HTML,
            Ul::widget()->style('color:red;')->render(),
        );
    }

    public function testTabIndex(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <ul tabindex="1">
            </ul>
            HTML,
            Ul::widget()->tabIndex(1)->render(),
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <ul title="test-title">
            </ul>
            HTML,
            Ul::widget()->title('test-title')->render(),
        );
    }

    public function testType(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <ul type="circle">
            <li>
            Item 1
            </li>
            <li>
            Item 2
            </li>
            </ul>
            HTML,
            Ul::widget()
                ->content(
                    Li::widget()->content('Item 1'),
                    Li::widget()->content('Item 2'),
                )
                ->type('circle')
                ->render(),
        );
    }
}
