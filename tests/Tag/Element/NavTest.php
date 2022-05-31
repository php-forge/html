<?php

declare(strict_types=1);

namespace Forge\Html\Tests\Tag\Element;

use Forge\Html\Tag\Element\A;
use Forge\Html\Tag\Element\Nav;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;

final class NavTest extends TestCase
{
    public function createProvider(): array
    {
        return [
            [[], '', '<nav></nav>'],
            [['class' => 'class'], '', '<nav class="class"></nav>'],
            [[], 'Content', '<nav>' . PHP_EOL . 'Content' . PHP_EOL . '</nav>'],
            [['disabled' => true], '', '<nav disabled></nav>'],
        ];
    }

    /**
     * @dataProvider createProvider
     *
     * @param array $attributes Tag attributes.
     * @param string $content Tag content.
     * @param string $expected Expected result.
     */
    public function testCreate(array $attributes, string $content, string $expected): void
    {
        $a = new A();
        $assert = new Assert();
        $nav = new Nav();
        $assert->equalsWithoutLE($expected, $nav->create($attributes, $content));
    }
}
