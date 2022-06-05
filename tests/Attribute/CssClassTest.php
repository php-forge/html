<?php

declare(strict_types=1);

namespace Forge\Html\Tests\Attribute;

use Forge\Html\Attribute\CssClass;
use PHPUnit\Framework\TestCase;

final class CssClassTest extends TestCase
{
    public function testAdd(): void
    {
        $attributes = [];
        $cssClass = new CssClass();

        $cssClass->add($attributes, '');
        $this->assertSame([], $attributes);

        $cssClass->add($attributes, []);
        $this->assertSame([], $attributes);

        $cssClass->add($attributes, 'class');
        $this->assertSame(['class' => 'class'], $attributes);

        $cssClass->add($attributes, 'class');
        $this->assertSame(['class' => 'class'], $attributes);

        $cssClass->add($attributes, 'class-1');
        $this->assertSame(['class' => 'class class-1'], $attributes);

        $cssClass->add($attributes, 'class');
        $this->assertSame(['class' => 'class class-1'], $attributes);

        $cssClass->add($attributes, 'class-1');
        $this->assertSame(['class' => 'class class-1'], $attributes);

        $cssClass->add($attributes, 'class-2');
        $this->assertSame(['class' => 'class class-1 class-2'], $attributes);

        $cssClass->add($attributes, 'class-1');
        $this->assertSame(['class' => 'class class-1 class-2'], $attributes);

        $attributes = ['class' => ['class']];

        $cssClass->add($attributes, 'class-1');
        $this->assertSame(['class' => ['class', 'class-1']], $attributes);

        $cssClass->add($attributes, 'class-1');
        $this->assertSame(['class' => ['class', 'class-1']], $attributes);

        $cssClass->add($attributes, 'class-2');
        $this->assertSame(['class' => ['class', 'class-1', 'class-2']], $attributes);

        $attributes = ['class' => 'class'];

        $cssClass->add($attributes, ['class-1', 'class-2']);
        $this->assertSame(['class' => 'class class-1 class-2'], $attributes);
    }

    /**
     * @depends testAdd
     */
    public function testMerge(): void
    {
        $attributes = ['class' => ['persistent' => 'class-1']];
        $cssClass = new CssClass();

        $cssClass->add($attributes, ['persistent' => 'class-2']);
        $this->assertSame(['persistent' => 'class-1'], $attributes['class']);

        $cssClass->add($attributes, ['additional' => 'class-2']);
        $this->assertSame(['persistent' => 'class-1', 'additional' => 'class-2'], $attributes['class']);
    }
}
