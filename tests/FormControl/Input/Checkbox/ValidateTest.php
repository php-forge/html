<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Checkbox;

use PHPForge\{Html\FormControl\Input\Checkbox, Support\Assert};
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
            <input id="checkbox-6582f2d099e8b" type="checkbox" required>
            HTML,
            Checkbox::widget()->id('checkbox-6582f2d099e8b')->required()->render()
        );
    }
}
