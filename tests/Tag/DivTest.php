<?php

declare(strict_types=1);

namespace Forge\Html\Tests\Tag;

use Forge\Html\Tag\Tag;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;

final class DivTest extends TestCase
{
    public function createProvider(): array
    {
        return [
            [[], '', '<div>' . PHP_EOL . '</div>'],
            [['class' => 'class'], '', '<div class="class">' . PHP_EOL . '</div>'],
            [[], 'Content', '<div>' . PHP_EOL . 'Content' . PHP_EOL . '</div>'],
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
        $assert = new Assert();

        $assert->equalsWithoutLE($expected, Tag::div($attributes, $content));
    }
}
