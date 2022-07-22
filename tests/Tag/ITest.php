<?php

declare(strict_types=1);

namespace Forge\Html\Tests\Tag;

use Forge\Html\Tag\Tag;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;

final class ITest extends TestCase
{
    public function createProvider(): array
    {
        return [
            [[], '', '<i></i>'],
            [['class' => 'class'], '', '<i class="class"></i>'],
            [[], 'Content', '<i>Content</i>'],
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

        $assert->equalsWithoutLE($expected, Tag::i($attributes, $content));
    }
}
