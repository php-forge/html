<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Head;

use PHPForge\Html\Head;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class CustomMethodTest extends TestCase
{
    public function testBeginEnd(): void
    {
        $this->assertSame('<head>value</head>', Head::widget()->begin() . 'value' . Head::end());
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <head>
            </head>
            HTML,
            Head::widget()->render(),
        );
    }
}
