<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Header;

use PHPForge\Html\Header;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class RenderTest extends TestCase
{
    public function testBlockLevelElements(): void
    {
        $this->assertSame('<header>test block</header>', Header::widget()->begin() . 'test block' . Header::end());
    }

    public function testElement(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <header>
            test element
            </header>
            HTML,
            Header::widget()->content('test element')->render(),
        );
    }
}
