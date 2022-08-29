<?php

declare(strict_types=1);

namespace Forge\Html\Tag;

use Forge\Html\Attribute;
use Forge\Html\Tag\Tag;
use InvalidArgumentException;
use Stringable;

use function array_merge;
use function gettype;
use function implode;
use function in_array;

/**
 * The select element represents a control for selecting among a list of options.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/select.html
 */
final class Select
{
    use Attribute\Autofocus;
    use Attribute\Classes;
    use Attribute\Disabled;
    use Attribute\Form;
    use Attribute\Id;
    use Attribute\Multiple;
    use Attribute\Name;
    use Attribute\Required;
    use Attribute\Size;
    use Attribute\Tabindex;
    use Attribute\Title;
    use Attribute\Value;

    private array $attributes = [];
    private array $groups = [];
    private array $items = [];
    private array $itemsAttributes = [];
    private string $prompt = '';

    /**
     * Return new instance with the HTML attributes. The following special options are recognized.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return static
     */
    public function attributes(array $values): static
    {
        $new = clone $this;
        $new->attributes = array_merge($this->attributes, $values);

        return $new;
    }

    /**
     * Returns a new instances with the attributes for the optgroup tags.
     *
     * The structure of this is similar to that of 'attributes', except that the array keys represent the optgroup
     * labels specified in $items.
     *
     * ```php
     * [
     *     'groups' => [
     *         '1' => ['label' => 'Chile'],
     *         '2' => ['label' => 'Russia']
     *     ],
     * ];
     * ```
     *
     * @param array $value
     *
     * @return self
     *
     * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/optgroup.html#optgroup
     */
    public function groups(array $value = []): self
    {
        $new = clone $this;
        $new->groups = $value;

        return $new;
    }

    /**
     * Returns a new instances with the option data items.
     *
     * The array keys are option values, and the array values are the corresponding option labels. The array can also
     * be nested (i.e. some array values are arrays too). For each sub-array, an option group will be generated whose
     * label is the key associated with the sub-array. If you have a list of data {@see Widget}, you may convert
     * them into the format described above using {@see \Yiisoft\Arrays\ArrayHelper::map()}
     *
     * Example:
     * ```php
     * [
     *     '1' => 'Santiago',
     *     '2' => 'Concepcion',
     *     '3' => 'Chillan',
     *     '4' => 'Moscu'
     *     '5' => 'San Petersburg',
     *     '6' => 'Novosibirsk',
     *     '7' => 'Ekaterinburgo'
     * ];
     * ```
     *
     * Example with options groups:
     * ```php
     * [
     *     '1' => [
     *         '1' => 'Santiago',
     *         '2' => 'Concepcion',
     *         '3' => 'Chillan',
     *     ],
     *     '2' => [
     *         '4' => 'Moscu',
     *         '5' => 'San Petersburg',
     *         '6' => 'Novosibirsk',
     *         '7' => 'Ekaterinburgo'
     *     ],
     * ];
     * ```
     *
     * @param array $value
     *
     * @return self
     */
    public function items(array $value = []): self
    {
        $new = clone $this;
        $new->items = $value;

        return $new;
    }

    /**
     * Returns a new instances with the HTML attributes for items. The following special options are recognized.
     *
     * @param array $values The Attribute values indexed by attribute names for hidden widget.
     *
     * @return self
     */
    public function itemsAttributes(array $values = []): self
    {
        $new = clone $this;
        $new->itemsAttributes = $values;

        return $new;
    }

    /**
     * Returns a new instances with the prompt option can be used to define a string that will be displayed on the first
     * line of the drop-down list widget.
     *
     * @param string $content The prompt content.
     * @param string $value The value for the prompt.
     *
     * @return self
     */
    public function prompt(string $content, string $value = ''): self
    {
        $attributes = '' === $value ? [] : ['value' => $value];

        $new = clone $this;
        $new->prompt = Tag::create('option', $content, $attributes);

        return $new;
    }

    /**
     * @return string the generated drop-down list tag.
     */
    public function render(): string
    {
        $attributes = $this->attributes;
        $items = '';

        /**
         * @psalm-var iterable<int, Stringable|scalar>|scalar|null $value
         *
         * @link https://www.w3.org/TR/2011/WD-html5-20110525/association-of-controls-and-forms.html#concept-fe-value
         */
        $value = $attributes['value'] ?? null;

        unset($attributes['value']);

        if (is_object($value)) {
            throw new InvalidArgumentException('Select widget value can not be an object.');
        }

        if ('' !== $this->prompt) {
            $items .= PHP_EOL . $this->prompt;
        }

        if ([] !== $this->items) {
            $items .= PHP_EOL . implode(PHP_EOL, $this->renderItems($value)) . PHP_EOL;
        }

        return Tag::create('select', $items, $attributes);
    }

    public static function create(): static
    {
        return new static();
    }

    /**
     * @param mixed $formValue
     *
     * @return array
     *
     * @psalm-param array<int, Stringable|scalar>|null|scalar $formValue
     * @psalm-return string[]
     */
    private function renderItems(mixed $formValue): array
    {
        $formValue = match (gettype($formValue)) {
            'array' => $formValue,
            'double' => [$formValue],
            'integer' => [$formValue],
            'NULL' => [],
            'string' => [$formValue],
        };
        $items = [];
        $itemsAttributes = $this->itemsAttributes;
        /** @psalm-var string[]|string[][] */
        $values = $this->items;

        foreach ($values as $value => $content) {
            if (is_array($content)) {
                /** @var array */
                $groupAttrs = $this->groups[$value] ?? [];
                $options = [];

                foreach ($content as $v => $c) {
                    /** @var array */
                    $itemsAttributes[$v] ??= [];
                    $options[] = Tag::create(
                        'option',
                        $c,
                        array_merge(
                            $itemsAttributes[$v],
                            ['selected' => in_array($v, $formValue) ? true : false, 'value' => $v],
                        )
                    );
                }

                $items[] = Tag::create('optgroup', implode(PHP_EOL, $options), $groupAttrs);
            } else {
                /** @var array */
                $itemsAttributes[$value] ??= [];
                $items[] = Tag::create(
                    'option',
                    $content,
                    array_merge(
                        $itemsAttributes[$value],
                        ['selected' => in_array($value, $formValue) ? true : false, 'value' => $value],
                    )
                );
            }
        }

        return $items;
    }
}
