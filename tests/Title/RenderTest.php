<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Title;

use PHPForge\Html\Title;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class RenderTest extends TestCase
{
    public function testBlockLevelElements(): void
    {
        $this->assertSame('<title>test block</title>', Title::widget()->begin() . 'test block' . Title::end());
    }

    public function testElement(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <title>
            test element
            </title>
            HTML,
            Title::widget()->content('test element')->render(),
        );
    }
}
