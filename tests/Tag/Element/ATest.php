<?php

declare(strict_types=1);

namespace Forge\Html\Tests\Tag\Element;

use Forge\Html\Tag\Element\A;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;

final class ATest extends TestCase
{
    public function createProvider(): array
    {
        return [
            [[], '', '<a></a>'],
            [['class' => 'class'], '', '<a class="class"></a>'],
            [[], 'Content', '<a>' . PHP_EOL . 'Content' . PHP_EOL . '</a>'],
            [['disabled' => true], '', '<a disabled></a>'],
            [
                ['download' => true, 'href' => '/images/myw3schoolsimage.jpg'],
                '',
                '<a href="/images/myw3schoolsimage.jpg" download></a>',
            ],
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
        $assert->equalsWithoutLE($expected, $a->create($attributes, $content));
    }
}
