<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Layout\Head;

use PHPForge\Html\Layout\Head;
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
            <head>value</head>
            HTML,
            Head::widget()->begin() . 'value' . Head::end()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <head>
            </head>
            HTML,
            Head::widget()->render()
        );
    }
}
