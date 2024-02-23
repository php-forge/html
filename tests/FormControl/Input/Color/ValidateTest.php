<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Color;

use PHPForge\{Html\FormControl\Input\Color, Support\Assert};
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ValidateTest extends TestCase
{
    public function testRequired(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="color-6582f2d099e8b" type="color" required>
            HTML,
            Color::widget()->id('color-6582f2d099e8b')->required()->render()
        );
    }
}
