<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Metadata\Meta;

use PHPForge\{Html\Metadata\Meta, Support\Assert};
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
            <meta>
            HTML,
            Meta::widget()->render()
        );
    }
}
