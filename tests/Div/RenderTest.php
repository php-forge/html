<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Div;

use PHPForge\Html\Div;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class RenderTest extends TestCase
{
    public function testBlockLevelElements(): void
    {
        $this->assertSame('<div>test block</div>', Div::widget()->begin() . 'test block' . Div::end());
    }

    public function testElement(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            test element
            </div>
            HTML,
            Div::widget()->content('test element')->render(),
        );
    }
}
