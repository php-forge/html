<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Document\Body;

use PHPForge\{Html\Document\Body, Support\Assert};
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
            <body>value</body>
            HTML,
            Body::widget()->begin() . 'value' . Body::end()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <body>
            </body>
            HTML,
            Body::widget()->render()
        );
    }
}
