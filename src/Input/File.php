<?php

declare(strict_types=1);

namespace PHPForge\Html\Input;

use PHPForge\Html\Attribute;
use PHPForge\Html\Helper\Utils;

/**
 * The input element with a type attribute whose value is "file" represents a list of file items, each consisting of a
 * file name, a file type, and a file body (the contents of the file).
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.file.html#input.file
 */
final class File extends Base\AbstractInput
{
    use Attribute\Custom\HasUnchecked;
    use Attribute\Input\CanBeMultiple;
    use Attribute\Input\HasAccept;

    protected function loadDefaultDefinitions(): array
    {
        return [
            'template()' => ['{prefix}\n{unchecktag}\n{tag}\n{suffix}'],
        ];
    }

    protected function run(): string
    {
        $attributes = $this->attributes;
        $multiple = $attributes['multiple'] ?? false;
        $name = $attributes['name'] ?? $this->uncheckName;
        $uncheckedTag = '';

        if ($multiple === true && array_key_exists('name', $attributes) && is_string($attributes['name'])) {
            $attributes['name'] = Utils::generateArrayableName($attributes['name']);
            $name = $attributes['name'];
        }

        if ($this->uncheckValue !== null) {
            $uncheckedTag = $this->renderUncheckTag($name);
        }

        // input type="file" not supported value attribute.
        unset($attributes['value']);

        return $this->buildInputTag($attributes, 'file', '{unchecktag}', $uncheckedTag);
    }
}
