<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Layout\Title;

use PHPForge\Html\Layout\Title;
use PHPForge\Support\Assert;
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
            <title>value</title>
            HTML,
            Title::widget()->begin() . 'value' . Title::end()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <title>
            </title>
            HTML,
            Title::widget()->render(),
        );
    }
}
