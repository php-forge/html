<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Button;

use PHPForge\Html\Button;
use PHPForge\Html\Span;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class RenderTest extends TestCase
{
    public function testContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <button type="button"></button>
            </div>
            HTML,
            Button::widget()->container(true)->render(),
        );
    }

    public function testContent(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button type="button">
            content
            </button>
            HTML,
            Button::widget()->content('content')->render(),
        );
    }

    public function testContentLink(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a role="button">
            content
            </a>
            HTML,
            Button::widget()->content('content')->type('link')->render(),
        );
    }

    public function testContentWithTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button type="button">
            Page: <span>2</span> of <span>5</span>
            </button>
            HTML,
            Button::widget()->content(
                'Page: ',
                Span::widget()->content('2'),
                " of ",
                Span::widget()->content('5'),
            )->render(),
        );
    }

    public function testElement(): void
    {
        $this->assertSame('<button type="button"></button>', Button::widget()->render());
    }

    public function testLink(): void
    {
        $this->assertSame(
            '<a href="https://example.com" role="button"></a>',
            Button::widget()->href('https://example.com')->type('link')->render(),
        );
    }

    public function testLinkWithDisabled(): void
    {
        $this->assertSame(
            '<a class="disabled" href="https://example.com" role="button" aria-disabled="true"></a>',
            Button::widget()->disabled()->href('https://example.com')->type('link')->render(),
        );
    }
}
