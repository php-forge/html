<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Head;

use PHPForge\Html\Head;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class RenderTest extends TestCase
{
    public function testBlockLevelElements(): void
    {
        $this->assertSame('<head>test block</head>', Head::widget()->begin() . 'test block' . Head::end());
    }

    public function testElement(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <head>
            test element
            </head>
            HTML,
            Head::widget()->content('test element')->render(),
        );
    }
}
