<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Base;

use PHPForge\Html\{
    Attribute\Custom\HasCsrf,
    Attribute\FormControl\HasAccept,
    Attribute\FormControl\HasAutocomplete,
    Attribute\FormControl\HasName,
    Attribute\Global\HasClass,
    Attribute\Global\HasId,
    Attribute\Global\HasLang,
    Attribute\Global\HasStyle,
    Attribute\Global\HasTitle,
    Attribute\HasAttributes,
    Attribute\HasContent,
    Attribute\Tag\CanBeNoValidate,
    Attribute\Tag\HasAction,
    Attribute\Tag\HasEnctype,
    Attribute\Tag\HasMethod,
    Attribute\Tag\HasRel,
    FormControl\Input\Hidden,
    HtmlBuilder
};
use PHPForge\Widget\Block;

use function explode;
use function implode;
use function strpos;
use function substr;
use function urldecode;

/**
 * Provides a foundation for creating HTML `form` elements with various attributes and content.
 */
abstract class AbstractForm extends Block
{
    use CanBeNoValidate;
    use HasAccept;
    use HasAction;
    use HasAttributes;
    use HasAutocomplete;
    use HasClass;
    use HasContent;
    use HasCsrf;
    use HasEnctype;
    use HasId;
    use HasLang;
    use HasMethod;
    use HasName;
    use HasRel;
    use HasStyle;
    use HasTitle;

    /**
     * Begin rendering the block element.
     *
     * @return string The opening tag of the block element.
     */
    public function begin(): string
    {
        parent::begin();

        $hiddenInputs = $this->renderHiddenInput();

        $html = HtmlBuilder::begin('form', $this->attributes);

        if ($hiddenInputs !== '') {
            $html .= "\n$hiddenInputs";
        }

        return "$html$this->content";
    }

    /**
     * Generate the HTML representation of the element.
     *
     * @return string The HTML representation of the element.
     */
    protected function run(): string
    {
        if ($this->isBeginExecuted() === false) {
            $hiddenInputs = $this->renderHiddenInput();

            $html = '';

            if ($hiddenInputs !== '') {
                $html = "$hiddenInputs\n";
            }

            return HtmlBuilder::create('form', $html . $this->content, $this->attributes);
        }

        return HtmlBuilder::end('form');
    }

    private function renderHiddenInput(): string
    {
        /** @var string $action */
        $action = $this->attributes['action'] ?? '';
        $hiddenInputs = [];
        $method = $this->attributes['method'] ?? '';

        if ($this->csrfToken !== '' && $method === 'POST') {
            $hiddenInputs[] = Hidden::widget()->id(null)->name($this->csrfName)->value($this->csrfToken)->render();
        }

        if ($method === 'GET' && ($pos = strpos($action, '?')) !== false) {
            /**
             * Query parameters in the action are ignored for GET method we use hidden fields to add them back.
             */
            foreach (explode('&', substr($action, $pos + 1)) as $pair) {
                $pos1 = strpos($pair, '=');

                if ($pos1 !== false) {
                    $hiddenInputs[] = Hidden::widget()
                        ->id(null)
                        ->name(urldecode(substr($pair, 0, $pos1)))
                        ->value(urldecode(substr($pair, $pos1 + 1)))
                        ->render();
                } else {
                    $hiddenInputs[] = Hidden::widget()->id(null)->name(urldecode($pair))->render();
                }
            }

            $this->attributes['action'] = substr($action, 0, $pos);
        }

        return $hiddenInputs !== [] ? implode(PHP_EOL, $hiddenInputs) : '';
    }
}
