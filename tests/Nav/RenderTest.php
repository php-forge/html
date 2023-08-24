<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Nav;

use PHPForge\Html\Nav;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class RenderTest extends TestCase
{
    public function testBlockLevelElements(): void
    {
        $this->assertSame('<nav>test block</nav>', Nav::widget()->begin() . 'test block' . Nav::end());
    }

    public function testElement(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <nav>
            test element
            </nav>
            HTML,
            Nav::widget()->content('test element')->render(),
        );
    }
}
