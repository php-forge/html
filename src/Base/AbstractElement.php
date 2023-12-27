<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use PHPForge\Html\Attribute;
use PHPForge\Html\HtmlBuilder;
use PHPForge\Widget\Element;

/**
 * Provides a foundation for creating HTML elements with various attributes and content.
 */
abstract class AbstractElement extends Element
{
    use Attribute\Custom\HasAttributes;
    use Attribute\Custom\HasContent;
    use Attribute\Custom\HasPrefixAndSuffix;
    use Attribute\Custom\HasTemplate;
    use Attribute\HasClass;
    use Attribute\HasData;
    use Attribute\HasId;
    use Attribute\HasLang;
    use Attribute\HasStyle;
    use Attribute\HasTabindex;
    use Attribute\HasTitle;
    use Attribute\Input\HasName;

    protected array $attributes = [];
    protected string $tagName = '';
    protected string $template = '{prefix}\n{tag}\n{suffix}';

    /**
     * Generate the HTML representation of the element.
     *
     * @return string The HTML representation of the element.
     */
    protected function run(): string
    {
        $attributes = $this->attributes;

        if (array_key_exists('id', $attributes) === false) {
            $attributes['id'] = $this->id;
        }

        $result = '';
        $tokenValues = [
            '{prefix}' => $this->renderPrefixTag(),
            '{tag}' => HtmlBuilder::create($this->tagName, $this->content, $attributes),
            '{suffix}' => $this->renderSuffixTag(),
        ];
        $tokenValues += $this->tokenValue;

        $tokens = explode('\n', $this->template);

        foreach ($tokens as $key => $token) {
            $tokenValue = strtr($token, $tokenValues);

            if ($tokenValue !== '') {
                $result .= $tokenValue;
            }

            if ($result !== '' && isset($tokens[$key + 1])) {
                $result = strtr($tokens[$key + 1], $tokenValues) !== '' ? $result . "\n" : $result;
            }
        }

        return $result;
    }
}
