<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Semantic\Nav;

use PHPForge\{Html\Semantic\Nav, Support\Assert};
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class CustomMethodTest extends TestCase
{
    public function testBeginEnd(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <nav>value</nav>
            HTML,
            Nav::widget()->begin() . 'value' . Nav::end()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <nav>
            </nav>
            HTML,
            Nav::widget()->render(),
        );
    }
}
