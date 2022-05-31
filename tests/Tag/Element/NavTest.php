<?php

declare(strict_types=1);

namespace Forge\Html\Tests\Tag\Element;

use Forge\Html\Tag\Element\Nav;
use PHPUnit\Framework\TestCase;

final class NavTest extends TestCase
{
    public function beginProvider(): array
    {
        return [
            [[], '<nav>'],
            [['class' => 'class', 'disabled' => true], '<nav class="class" disabled>'],
        ];
    }

    /**
     * @dataProvider beginProvider
     *
     * @param array $attributes Tag attributes.
     * @param string $expected Expected result.
     */
    public function testBegin(array $attributes, string $expected): void
    {
        $nav = new Nav();
        $this->assertSame($expected, $nav->begin($attributes));
    }

    public function testEnd(): void
    {
        $nav = new Nav();
        $this->assertSame('</nav>', $nav->end());
    }
}
