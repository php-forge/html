<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Radio;

use PHPForge\{Html\FormControl\Input\Radio, Support\Assert};
use PHPUnit\Framework\TestCase;

final class ValidateTest extends TestCase
{
    public function testRequired(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="radio-6582f2d099e8b" type="radio" required>
            HTML,
            Radio::widget()->id('radio-6582f2d099e8b')->required()->render()
        );
    }
}
