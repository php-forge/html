<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Base;

use Forge\Html\Attribute;
use PHPUnit\Framework\TestCase;

final class AttributesHtmlTest extends TestCase
{
    public function testImmutability(): void
    {
        $widget = $this->widget();
        $this->assertNotSame($widget, $widget->accept(''));
        $this->assertNotSame($widget, $widget->ariaDescribedBy(''));
        $this->assertNotSame($widget, $widget->ariaLabel(''));
        $this->assertNotSame($widget, $widget->autocomplete('on'));
        $this->assertNotSame($widget, $widget->autofocus());
        $this->assertNotSame($widget, $widget->checked(false));
        $this->assertNotSame($widget, $widget->class(''));
        $this->assertNotSame($widget, $widget->dirname('test.dir'));
        $this->assertNotSame($widget, $widget->disabled());
        $this->assertNotSame($widget, $widget->form('test.form'));
        $this->assertNotSame($widget, $widget->formaction('test.formaction'));
        $this->assertNotSame($widget, $widget->formenctype('multipart/form-data'));
        $this->assertNotSame($widget, $widget->formmethod('post'));
        $this->assertNotSame($widget, $widget->formnovalidate());
        $this->assertNotSame($widget, $widget->formtarget('_blank'));
        $this->assertNotSame($widget, $widget->id('test.id'));
        $this->assertNotSame($widget, $widget->list('test.list'));
        $this->assertNotSame($widget, $widget->max(''));
        $this->assertNotSame($widget, $widget->maxlength(0));
        $this->assertNotSame($widget, $widget->min(''));
        $this->assertNotSame($widget, $widget->MinLength(0));
        $this->assertNotSame($widget, $widget->multiple());
        $this->assertNotSame($widget, $widget->name('test.name'));
        $this->assertNotSame($widget, $widget->pattern(''));
        $this->assertNotSame($widget, $widget->placeholder(''));
        $this->assertNotSame($widget, $widget->readonly());
        $this->assertNotSame($widget, $widget->required());
        $this->assertNotSame($widget, $widget->size(0));
        $this->assertNotSame($widget, $widget->step(0));
        $this->assertNotSame($widget, $widget->tabindex(0));
        $this->assertNotSame($widget, $widget->title(''));
        $this->assertNotSame($widget, $widget->type(''));
        $this->assertNotSame($widget, $widget->value(''));
    }

    private function widget(): object
    {
        return new class () {
            use Attribute\Accept;
            use Attribute\AriaDescribedBy;
            use Attribute\AriaLabel;
            use Attribute\Autocomplete;
            use Attribute\Autofocus;
            use Attribute\Checked;
            use Attribute\Classes;
            use Attribute\Dirname;
            use Attribute\Disabled;
            use Attribute\Form;
            use Attribute\Formaction;
            use Attribute\Formenctype;
            use Attribute\Formmethod;
            use Attribute\Formnovalidate;
            use Attribute\Formtarget;
            use Attribute\Id;
            use Attribute\Lists;
            use Attribute\Max;
            use Attribute\MaxLength;
            use Attribute\Min;
            use Attribute\MinLength;
            use Attribute\Multiple;
            use Attribute\Name;
            use Attribute\Pattern;
            use Attribute\Placeholder;
            use Attribute\Readonlys;
            use Attribute\Required;
            use Attribute\Size;
            use Attribute\Step;
            use Attribute\TabIndex;
            use Attribute\Title;
            use Attribute\Type;
            use Attribute\Value;

            protected array $attributes = [];
        };
    }
}
