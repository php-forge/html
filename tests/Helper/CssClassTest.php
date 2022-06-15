<?php

declare(strict_types=1);

namespace Forge\Html\Tests\Attribute;

use Forge\Html\Helper\CssClass;
use PHPUnit\Framework\TestCase;

final class CssClassTest extends TestCase
{
    public function testAdd(): void
    {
        $attributes = [];

        CssClass::add($attributes, '');
        $this->assertSame([], $attributes);

        CssClass::add($attributes, []);
        $this->assertSame([], $attributes);

        CssClass::add($attributes, 'class');
        $this->assertSame(['class' => 'class'], $attributes);

        CssClass::add($attributes, 'class');
        $this->assertSame(['class' => 'class'], $attributes);

        CssClass::add($attributes, 'class-1');
        $this->assertSame(['class' => 'class class-1'], $attributes);

        CssClass::add($attributes, 'class');
        $this->assertSame(['class' => 'class class-1'], $attributes);

        CssClass::add($attributes, 'class-1');
        $this->assertSame(['class' => 'class class-1'], $attributes);

        CssClass::add($attributes, 'class-2');
        $this->assertSame(['class' => 'class class-1 class-2'], $attributes);

        CssClass::add($attributes, 'class-1');
        $this->assertSame(['class' => 'class class-1 class-2'], $attributes);

        $attributes = ['class' => ['class']];

        CssClass::add($attributes, 'class-1');
        $this->assertSame(['class' => ['class', 'class-1']], $attributes);

        CssClass::add($attributes, 'class-1');
        $this->assertSame(['class' => ['class', 'class-1']], $attributes);

        CssClass::add($attributes, 'class-2');
        $this->assertSame(['class' => ['class', 'class-1', 'class-2']], $attributes);

        $attributes = ['class' => 'class'];

        CssClass::add($attributes, ['class-1', 'class-2']);
        $this->assertSame(['class' => 'class class-1 class-2'], $attributes);
    }

    /**
     * @depends testAdd
     */
    public function testMerge(): void
    {
        $attributes = ['class' => ['persistent' => 'class-1']];

        CssClass::add($attributes, ['persistent' => 'class-2']);
        $this->assertSame(['persistent' => 'class-1'], $attributes['class']);

        CssClass::add($attributes, ['additional' => 'class-2']);
        $this->assertSame(['persistent' => 'class-1', 'additional' => 'class-2'], $attributes['class']);
    }
}
