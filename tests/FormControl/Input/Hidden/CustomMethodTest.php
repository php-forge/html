<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Hidden;

use PHPForge\{Html\FormControl\Input\Hidden, Support\Assert};
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class CustomMethodTest extends TestCase
{
    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="hidden-6582f2d099e8b" type="hidden">
            HTML,
            Hidden::widget()->id('hidden-6582f2d099e8b')->render()
        );
    }
}
