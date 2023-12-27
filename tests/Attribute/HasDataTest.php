<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute;

use InvalidArgumentException;
use PHPForge\Html\Attribute\Enum\DataAttributes;
use PHPForge\Html\Attribute\HasData;
use PHPUnit\Framework\TestCase;

final class HasDataTest extends TestCase
{
    public function testClosure(): void
    {
        $instance = new class () {
            use HasData;

            public array $attributes = [];
        };

        $closure = fn () => 'test-action';
        $instance = $instance->dataAttributes([DataAttributes::ACTION => $closure]);

        $this->assertSame(['data-action' => $closure], $instance->attributes);
    }

    public function testDataBsAutoClose(): void
    {
        $instance = new class () {
            use HasData;

            public array $attributes = [];
        };

        $instance = $instance->dataBsAutoClose('true');

        $this->assertSame(['data-bs-auto-close' => 'true'], $instance->attributes);
    }

    public function testDataBsToggle(): void
    {
        $instance = new class () {
            use HasData;

            public array $attributes = [];
        };

        $instance = $instance->dataBsToggle('collapse');

        $this->assertSame(['data-bs-toggle' => 'collapse'], $instance->attributes);
    }

    public function testDataBsTarget(): void
    {
        $instance = new class () {
            use HasData;

            public array $attributes = [];
        };

        $instance = $instance->dataBsTarget('id');

        $this->assertSame(['data-bs-target' => 'id'], $instance->attributes);
    }

    public function testDataBsTargetWithTrue(): void
    {
        $instance = new class () {
            use HasData;

            public array $attributes = [];

            public function getDataBsTarget(): bool|string
            {
                return $this->dataBsTarget;
            }
        };

        $instance = $instance->dataBsTarget(true);

        $this->assertTrue($instance->getDataBsTarget());
    }

    public function testDataCollapseToggle(): void
    {
        $instance = new class () {
            use HasData;

            public array $attributes = [];
        };

        $instance = $instance->dataCollapseToggle('id');

        $this->assertSame(['data-collapse-toggle' => 'id'], $instance->attributes);
    }

    public function testDataDismissTarget(): void
    {
        $instance = new class () {
            use HasData;

            public array $attributes = [];
        };

        $instance = $instance->dataDismissTarget('id');

        $this->assertSame(['data-dismiss-target' => 'id'], $instance->attributes);
    }

    public function testDataDismissTargetWithTrue(): void
    {
        $instance = new class () {
            use HasData;

            public array $attributes = [];

            public function getDataDismissTarget(): bool|string
            {
                return $this->dataDismissTarget;
            }
        };

        $instance = $instance->dataDismissTarget(true);

        $this->assertTrue($instance->getDataDismissTarget());
    }

    public function testDataDrawerTarget(): void
    {
        $instance = new class () {
            use HasData;

            public array $attributes = [];
        };

        $instance = $instance->dataDrawerTarget('id');

        $this->assertSame(['data-drawer-target' => 'id'], $instance->attributes);
    }

    public function testDataDrawerTargetWithTrue(): void
    {
        $instance = new class () {
            use HasData;

            public array $attributes = [];

            public function getDataDrawerTarget(): bool|string
            {
                return $this->dataDrawerTarget;
            }
        };

        $instance = $instance->dataDrawerTarget(true);

        $this->assertTrue($instance->getDataDrawerTarget());
    }

    public function testDataDataToggle(): void
    {
        $instance = new class () {
            use HasData;

            public array $attributes = [];
        };

        $instance = $instance->dataToggle('id');

        $this->assertSame(['data-toggle' => 'id'], $instance->attributes);
    }

    public function testDataDataToggleWithTrue(): void
    {
        $instance = new class () {
            use HasData;

            public array $attributes = [];

            public function getDataDrawerToggle(): bool|string
            {
                return $this->dataToggle;
            }
        };

        $instance = $instance->dataToggle(true);

        $this->assertTrue($instance->getDataDrawerToggle());
    }

    public function testDataDropdownToggle(): void
    {
        $instance = new class () {
            use HasData;

            public array $attributes = [];
        };

        $instance = $instance->dataDropdownToggle('id');

        $this->assertSame(['data-dropdown-toggle' => 'id'], $instance->attributes);
    }

    public function testDataDropdownToggleWithTrue(): void
    {
        $instance = new class () {
            use HasData;

            public array $attributes = [];

            public function getDataDropdownToggle(): bool|string
            {
                return $this->dataDropdownToggle;
            }
        };

        $instance = $instance->dataDropdownToggle(true);

        $this->assertTrue($instance->getDataDropdownToggle());
    }

    public function testExceptionKey(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'The data attribute key must be a string and the value must be a string or a Closure.',
        );

        $instance = new class () {
            use HasData;

            protected array $attributes = [];
        };

        $instance->dataAttributes([1 => '']);
    }

    public function testExceptionValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'The data attribute key must be a string and the value must be a string or a Closure.',
        );

        $instance = new class () {
            use HasData;

            protected array $attributes = [];
        };

        $instance->dataAttributes(['' => 1]);
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasData;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->dataAttributes([DataAttributes::ACTION => 'test-action']));
        $this->assertNotSame($instance, $instance->dataBsTarget(true));
        $this->assertNotSame($instance, $instance->dataDismissTarget(true));
        $this->assertNotSame($instance, $instance->dataDrawerTarget(true));
        $this->assertNotSame($instance, $instance->dataDropdownToggle(true));
        $this->assertNotSame($instance, $instance->dataToggle(true));
    }
}
