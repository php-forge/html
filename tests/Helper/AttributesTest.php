<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute;

use PHPForge\Html\Helper\Attributes;
use PHPUnit\Framework\TestCase;

final class AttributesTest extends TestCase
{
    /**
     * @dataProvider PHPForge\Html\Tests\Provider\AttributesProvider::dataRenderTagAttributes
     */
    public function testRenderTagAttributes(string $expected, array $attributes): void
    {
        $this->assertSame($expected, (new Attributes())->render($attributes));
    }
}
