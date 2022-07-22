<?php

declare(strict_types=1);

namespace Forge\Html\Tests\Tag;

use Forge\Html\Tag\Tag;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;

final class PTest extends TestCase
{
    public function createProvider(): array
    {
        return [
            [[], '', '<p>' . PHP_EOL . '</p>'],
            [['class' => 'class'], '', '<p class="class">' . PHP_EOL . '</p>'],
            [[], 'Content', '<p>' . PHP_EOL . 'Content' . PHP_EOL . '</p>'],
            [['disabled' => true], '', '<p disabled>' . PHP_EOL . '</p>'],
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

        $assert->equalsWithoutLE($expected, Tag::p($attributes, $content));
    }
}
