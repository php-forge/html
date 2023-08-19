<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Button;

use InvalidArgumentException;
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

    public function testToggle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <button class="test-class" id="id" type="button" aria-controls="id" data-drawer-target="id" data-drawer-toggle="id">
            <span class="sr-only">Open sidebar</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"><path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"/></svg>
            </button>
            HTML,
            Button::widget()->class('test-class')->id('id')->type('toggle')->render(),
        );
    }

    public function testToggleException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The id attribute is required for the button toggle.');

        Button::widget()->type('toggle')->render();
    }
}
