<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Body;

use PHPForge\Html\Body;
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
            <body class="value">
            </body>
            HTML,
            Body::widget()->attributes(['class' => 'value'])->render(),
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <body class="value">
            </body>
            HTML,
            Body::widget()->class('value')->render(),
        );
    }

    public function testContent(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <body>
            value
            </body>
            HTML,
            Body::widget()->content('value')->render(),
        );
    }

    public function testDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <body data-value="value">
            </body>
            HTML,
            Body::widget()->dataAttributes(['value' => 'value'])->render(),
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <body id="value">
            </body>
            HTML,
            Body::widget()->id('value')->render(),
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <body lang="value">
            </body>
            HTML,
            Body::widget()->lang('value')->render(),
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <body name="value">
            </body>
            HTML,
            Body::widget()->name('value')->render(),
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <body style="value">
            </body>
            HTML,
            Body::widget()->style('value')->render(),
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <body title="value">
            </body>
            HTML,
            Body::widget()->title('value')->render(),
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
