<?php

declare(strict_types=1);

namespace PHPForge\Html\Input\Base;

use PHPForge\Html\Attribute;
use PHPForge\Html\Input\InputInterface;
use PHPForge\Html\Input\LabelInterface;
use PHPForge\Html\Tag;
use PHPForge\Widget\Element;

abstract class AbstractButton extends Element implements LabelInterface, InputInterface
{
    use Attribute\Aria\HasAriaDescribedBy;
    use Attribute\Aria\HasAriaLabel;
    use Attribute\CanBeAutofocus;
    use Attribute\CanBeHidden;
    use Attribute\Custom\HasAttributes;
    use Attribute\Custom\HasContainer;
    use Attribute\Custom\HasLabel;
    use Attribute\Custom\HasPrefixAndSuffix;
    use Attribute\Custom\HasTemplate;
    use Attribute\Custom\HasWidgetValidation;
    use Attribute\HasClass;
    use Attribute\HasData;
    use Attribute\HasId;
    use Attribute\HasLang;
    use Attribute\HasStyle;
    use Attribute\HasTabindex;
    use Attribute\HasTitle;
    use Attribute\Input\CanBeDisabled;
    use Attribute\Input\CanBeReadonly;
    use Attribute\Input\HasForm;
    use Attribute\Input\HasName;
    use Attribute\Input\HasType;
    use Attribute\Input\HasValue;

    protected array $attributes = [];
    protected string $template = '{prefix}\n{label}\n{tag}\n{suffix}';
    protected string $type = 'button';

    public function loadDefaultDefinitions(): array
    {
        return [
            'container()' => [true],
        ];
    }

    protected function run(): string
    {
        $this->validateStringValue($this->getValue());

        $attributes = $this->attributes;
        $type = $attributes['type'] ?? 'button';

        $id = $this->generateId("$type-");
        $labelFor = $this->labelFor ?? $this->getId();

        if ($this->ariaDescribedBy === true) {
            $attributes['aria-describedby'] = "$id-help";
        }

        return $this->renderContainerTag(
            null,
            Tag::widget()
                ->attributes($attributes)
                ->id($id)
                ->prefix($this->prefix)
                ->prefixContainer($this->prefixContainer)
                ->prefixContainerAttributes($this->prefixContainerAttributes)
                ->prefixContainerTag($this->prefixContainerTag)
                ->suffix($this->suffix)
                ->suffixContainer($this->suffixContainer)
                ->suffixContainerAttributes($this->suffixContainerAttributes)
                ->suffixContainerTag($this->suffixContainerTag)
                ->tagName('input')
                ->template($this->template)
                ->tokenValue('{label}', $this->renderLabelTag($labelFor))
                ->type($type)
                ->render()
        );
    }
}
