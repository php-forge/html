<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Input;

use PHPForge\{
    Html\Attribute\Custom\HasUncheckedCollection,
    Html\Attribute\FormControl\CanBeMultiple,
    Html\Attribute\FormControl\CanBeRequired,
    Html\Attribute\FormControl\HasAccept,
    Html\Helper\Utils,
    Html\Interop\RequiredInterface
};

/**
 * The input element with a type attribute whose value is "file" represents a list of file items, each consisting of a
 * file name, a file type, and a file body (the contents of the file).
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.file.html#input.file
 */
final class File extends Base\AbstractInput implements RequiredInterface
{
    use CanBeMultiple;
    use CanBeRequired;
    use HasAccept;
    use HasUncheckedCollection;

    protected string $type = 'file';

    protected function loadDefaultDefinitions(): array
    {
        return [
            'id()' => [Utils::generateId('file-')],
            'template()' => ['{prefix}\n{unchecktag}\n{tag}\n{suffix}'],
        ];
    }

    protected function run(): string
    {
        $attributes = $this->attributes;
        $name = $this->getName();

        if ($this->isMultiple() === true && $name !== '') {
            $name = Utils::generateArrayableName($name);
            $attributes['name'] = $name;
        }

        // The value attribute is not allowed for the input type `file`.
        unset($attributes['value']);

        return $this->renderInputTag($attributes, ['{unchecktag}' => $this->renderUncheckTag($name)]);
    }
}
