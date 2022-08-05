<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Base;

use Forge\Html\Attribute;
use PHPUnit\Framework\TestCase;

final class MutationTest extends TestCase
{
    public function testAutofocus(): void
    {
        $widget = $this->widget()->autofocus();
        $this->assertSame(['autofocus' => true], $widget->attributes);
    }

    public function testClass(): void
    {
        $widget = $this->widget()->class('test-class');
        $this->assertSame(['class' => 'test-class'], $widget->attributes);
    }

    public function testFormnovalidate(): void
    {
        $widget = $this->widget()->formnovalidate();
        $this->assertSame(['formnovalidate' => true], $widget->attributes);
    }

    public function testReadOnly(): void
    {
        $widget = $this->widget()->readonly();
        $this->assertSame(['readonly' => true], $widget->attributes);
    }

    public function testReadOnlyWithFalse(): void
    {
        $widget = $this->widget()->readonly(false);
        $this->assertSame(['readonly' => false], $widget->attributes);
    }

    public function testReadOnlyWithTrue(): void
    {
        $widget = $this->widget()->readonly(true);
        $this->assertSame(['readonly' => true], $widget->attributes);
    }

    private function widget(): object
    {
        return new class () {
            use Attribute\Autofocus;
            use Attribute\Classes;
            use Attribute\Formnovalidate;
            use Attribute\Readonlys;

            public array $attributes = [];
        };
    }
}
