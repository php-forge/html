<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\ButtonLink;

use PHPForge\Html\ButtonLink;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class RenderTest extends TestCase
{
    public function testContent(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a role="button">
            content
            </a>
            HTML,
            ButtonLink::widget()->content('content')->render(),
        );
    }

    public function testDisabled(): void
    {
        $this->assertSame(
            '<a class="disabled" href="https://example.com" role="button" aria-disabled="true"></a>',
            ButtonLink::widget()->disabled()->href('https://example.com')->render(),
        );
    }

    public function testRender(): void
    {
        $this->assertSame(
            '<a href="https://example.com" role="button"></a>',
            ButtonLink::widget()->href('https://example.com')->render(),
        );
    }
}
