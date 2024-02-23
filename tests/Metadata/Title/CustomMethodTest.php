<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Metadata\Title;

use PHPForge\{Html\Metadata\Title, Support\Assert};
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
