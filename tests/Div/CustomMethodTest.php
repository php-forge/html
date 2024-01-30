<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Div;

use PHPForge\Html\Div;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class CustomMethodTest extends TestCase
{
    public function testBeginEnd(): void
    {
        $this->assertSame('<div>value</div>', Div::widget()->begin() . 'value' . Div::end());
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            </div>
            HTML,
            Div::widget()->render(),
        );
    }
}
