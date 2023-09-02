<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Body;

use PHPForge\Html\Body;
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
            <body class="test-class">
            </body>
            HTML,
            Body::widget()->attributes(['class' => 'test-class'])->render(),
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <body class="test-class">
            </body>
            HTML,
            Body::widget()->class('test-class')->render(),
        );
    }

    public function testBlockLevelElements(): void
    {
        $this->assertSame('<body>test block</body>', Body::widget()->begin() . 'test block' . Body::end());
    }

    public function testContent(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <body>
            test content
            </body>
            HTML,
            Body::widget()->content('test content')->render(),
        );
    }

    public function testElement(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <body>
            test element
            </body>
            HTML,
            Body::widget()->content('test element')->render(),
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <body id="test-id">
            </body>
            HTML,
            Body::widget()->id('test-id')->render(),
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <body lang="en">
            </body>
            HTML,
            Body::widget()->lang('en')->render(),
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <body name="test-name">
            </body>
            HTML,
            Body::widget()->name('test-name')->render(),
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <body style="color: red;">
            </body>
            HTML,
            Body::widget()->style('color: red;')->render(),
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <body title="test-title">
            </body>
            HTML,
            Body::widget()->title('test-title')->render(),
        );
    }

    public function testWithoutId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <body>
            </body>
            HTML,
            Body::widget()->id(null)->render(),
        );
    }

    public function testWithoutName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <body>
            </body>
            HTML,
            Body::widget()->name(null)->render(),
        );
    }
}
