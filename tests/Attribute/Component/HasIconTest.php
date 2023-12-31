<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Component;

use InvalidArgumentException;
use PHPForge\Html\Attribute\Component\HasIcon;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

final class HasIconTest extends TestCase
{
    public function testClass(): void
    {
        $instance = new class () {
            use HasIcon;

            public function getIconClass(): string
            {
                return $this->iconClass;
            }
        };

        $this->assertEmpty($instance->getIconClass());

        $instance = $instance->iconClass('class');

        $this->assertSame('class', $instance->getIconClass());
    }

    public function testContainerClass(): void
    {
        $instance = new class () {
            use HasIcon;

            public function getIconContainerClass(): string
            {
                return $this->iconContainerAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getIconContainerClass());

        $instance = $instance->iconContainerClass('class');

        $this->assertSame('class', $instance->getIconContainerClass());

        $instance = $instance->iconContainerClass('class-1');

        $this->assertSame('class class-1', $instance->getIconContainerClass());

        $instance = $instance->iconContainerClass('class', true);

        $this->assertSame('class', $instance->getIconContainerClass());
    }

    public function testGetIconAttributes(): void
    {
        $instance = new class () {
            use HasIcon;
        };

        $this->assertEmpty($instance->getIconAttributes());

        $instance = $instance->iconAttributes(['class' => 'class']);

        $this->assertSame(['class' => 'class'], $instance->getIconAttributes());
    }

    public function testGetIconContainerAttributes(): void
    {
        $instance = new class () {
            use HasIcon;
        };

        $this->assertEmpty($instance->getIconContainerAttributes());

        $instance = $instance->iconContainerAttributes(['class' => 'class']);

        $this->assertSame(['class' => 'class'], $instance->getIconContainerAttributes());
    }

    public function testGetIconContent(): void
    {
        $instance = new class () {
            use HasIcon;
        };

        $this->assertEmpty($instance->getIconContent());

        $instance = $instance->iconContent('content');

        $this->assertSame('content', $instance->getIconContent());
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasIcon;
        };

        $this->assertNotSame($instance, $instance->iconAttributes([]));
        $this->assertNotSame($instance, $instance->icon(false));
        $this->assertNotSame($instance, $instance->iconClass(''));
        $this->assertNotSame($instance, $instance->iconContainer(true));
        $this->assertNotSame($instance, $instance->iconContainerAttributes([]));
        $this->assertNotSame($instance, $instance->iconContainerClass(''));
        $this->assertNotSame($instance, $instance->iconContent(''));
        $this->assertNotSame($instance, $instance->iconFilePath(''));
        $this->assertNotSame($instance, $instance->iconTag('i'));
    }

    public function testRenderIconTag(): void
    {
        $instance = new class () {
            use HasIcon;

            public function getIconTag(): string
            {
                return $this->iconTag;
            }

            public function render(): string
            {
                return $this->renderIconTag();
            }
        };

        $this->assertEmpty($instance->render());

        $instance = $instance->icon(true);

        $this->assertEmpty($instance->render());
    }

    public function testRenderIconTagWithClass(): void
    {
        $instance = new class () {
            use HasIcon;

            public function getIconTag(): string
            {
                return $this->iconTag;
            }

            public function render(): string
            {
                return $this->renderIconTag();
            }
        };

        $this->assertEmpty($instance->render());

        $instance = $instance->iconClass('class')->iconContent('content');

        Assert::equalsWithoutLE(
            <<<HTML
            <svg class="class">
            content
            </svg>
            HTML,
            $instance->render()
        );
    }

    public function testRenderIconTagWithContainer(): void
    {
        $instance = new class () {
            use HasIcon;

            public function getIconTag(): string
            {
                return $this->iconTag;
            }

            public function render(): string
            {
                return $this->renderIconTag();
            }
        };

        $this->assertEmpty($instance->render());

        $instance = $instance->iconClass('class')->iconContainer(true)->iconContent('content');

        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <svg class="class">
            content
            </svg>
            </div>
            HTML,
            $instance->render()
        );
    }

    public function testRenderIconTagWithContent(): void
    {
        $instance = new class () {
            use HasIcon;

            public function getIconTag(): string
            {
                return $this->iconTag;
            }

            public function render(): string
            {
                return $this->renderIconTag();
            }
        };

        $this->assertEmpty($instance->render());

        $instance = $instance->iconContent('content')->iconTag('i');

        Assert::equalsWithoutLE(
            <<<HTML
            <i>content</i>
            HTML,
            $instance->render()
        );
    }

    public function testRenderIconTagWithSVG(): void
    {
        $instance = new class () {
            use HasIcon;

            public function getIconTag(): string
            {
                return $this->iconTag;
            }

            public function render(): string
            {
                return $this->renderIconTag();
            }
        };

        $this->assertEmpty($instance->render());

        $instance = $instance->iconFilePath(dirname(__DIR__, 3) . '/src/Base/Svg/toggle.svg');

        Assert::assertStringContainsString(
            <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"><path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"/></svg>
            HTML,
            $instance->render()
        );
    }

    public function testTag(): void
    {
        $instance = new class () {
            use HasIcon;

            public function getIconTag(): string
            {
                return $this->iconTag;
            }
        };

        $this->assertSame('svg', $instance->getIconTag());

        $instance = $instance->iconTag('span');

        $this->assertSame('span', $instance->getIconTag());
    }

    public function testTagException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The icon tag must be a non-empty string.');

        $instance = new class () {
            use HasIcon;
        };

        $instance->iconTag('');
    }
}
