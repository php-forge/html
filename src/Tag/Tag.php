<?php

declare(strict_types=1);

namespace Forge\Html\Tag;

use Forge\Html\Attribute\Attributes;
use InvalidArgumentException;

use function strtolower;

final class Tag
{
    /** @var array<array-key, string> */
    private const VOID_ELEMENT = [
        'area' => '',
        'base' => '',
        'br' => '',
        'col' => '',
        'command' => '',
        'embed' => '',
        'hr' => '',
        'img' => '',
        'input' => '',
        'keygen' => '',
        'link' => '',
        'meta' => '',
        'param' => '',
        'source' => '',
        'track' => '',
        'wbr' => '',
    ];


    private Attributes $attributes;

    public function __construct()
    {
        $this->attributes = new Attributes();
    }

    public function begin(string $tag, array $attributes = []): string
    {
        $tag = $this->validateTag($tag);
        return '<' . $tag . $this->attributes->render($attributes) . '>';
    }

    public function end(string $tag): string
    {
        $tag = $this->validateTag($tag);
        return '</' . $tag . '>';
    }

    public function create(string $tag, string $content = '', array $attributes = []): string
    {
        $tag = $this->validateTag($tag);
        $html = "<$tag" . $this->attributes->render($attributes) . '>';
        $content = $content === '' ? '' : PHP_EOL . $content . PHP_EOL;
        return $this->voidElements($tag) !== '' ? $html : $html . $content . '</' . $tag . '>';
    }

    /**
     * {@see http://www.w3.org/TR/html-markup/syntax.html#void-element}
     *
     * @return string list of void elements (element name => '').
     */
    private function voidElements(string $tag): string
    {
        $result = '';

        if (array_key_exists($tag, self::VOID_ELEMENT)) {
            $result = $tag;
        }

        return $result;
    }

    private function validateTag(string $tag): string
    {
        $tag = strtolower($tag);

        if ($tag === '') {
            throw new InvalidArgumentException('Tag name cannot be empty.');
        }

        return $tag;
    }
}
