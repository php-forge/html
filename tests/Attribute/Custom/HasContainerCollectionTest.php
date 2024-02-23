<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use InvalidArgumentException;
use PHPForge\{Html\Attribute\Custom\HasContainerCollection, Html\FormControl\Input\Base\AbstractButton, Support\Assert};
use PHPUnit\Framework\TestCase;

final class HasContainerCollectionTest extends TestCase
{
    public function testClass(): void
    {
        $instance = new class () {
            use HasContainerCollection;

            public function getContainerClass(): string
            {
                return $this->containerAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getContainerClass());

        $instance = $instance->containerClass('class');

        $this->assertSame('class', $instance->getContainerClass());

        $instance = $instance->containerClass('class-1');

        $this->assertSame('class class-1', $instance->getContainerClass());

        $instance = $instance->containerClass('override-class', true);

        $this->assertSame('override-class', $instance->getContainerClass());
    }

    public function testException(): void
    {
        $instance = new class () {
            use HasContainerCollection;
        };

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The container tag must be a non-empty string.');

        $instance->containerTag('');
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasContainerCollection;
        };

        $this->assertNotSame($instance, $instance->container(true));
        $this->assertNotSame($instance, $instance->containerAttributes([]));
        $this->assertNotSame($instance, $instance->containerClass(''));
        $this->assertNotSame($instance, $instance->containerTag('span'));
    }

    public function testRenderContainterTag(): void
    {
        $instance = new class () extends AbstractButton {
            public function run(): string
            {
                return $this->renderContainerTag(null, 'content');
            }
        };

        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            content
            </div>
            HTML,
            $instance->container(true)->run()
        );
    }
}
