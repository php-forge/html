<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Input;

use PHPForge\{
    Html\Attribute\Custom\HasUncheckedCollection,
    Html\Attribute\Input\CanBeMultiple,
    Html\Attribute\Input\CanBeRequired,
    Html\Attribute\Input\HasAccept,
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
        /** @var string $name */
        $name = $attributes['name'] ?? '';

        if ($multiple === true && $name !== '') {
            $name = Utils::generateArrayableName($name);
        }

        // The value attribute is not allowed for the input type `file`.
        unset($attributes['value']);

        return $this->buildInputTag(
            $attributes,
            'file',
            [
                '{unchecktag}' => $this->renderUncheckTag($name),
            ],
            $name
        );
    }
}
