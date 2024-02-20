<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Base;

use PHPForge\Html\Attribute\Custom\{HasAttributes, HasContent, HasCsrf};
use PHPForge\Html\Attribute\Input\{HasAccept, HasAutocomplete, HasName};
use PHPForge\Html\Attribute\Tag\{CanBeNoValidate, HasAction, HasEnctype, HasMethod, HasRel};
use PHPForge\Html\Attribute\{HasClass, HasId, HasLang, HasStyle, HasTitle};
use PHPForge\Html\FormControl\Input\Hidden;
use PHPForge\Html\HtmlBuilder;
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

    protected array $attributes = [];

    /**
     * Begin rendering the block element.
     *
     * @return string The opening tag of the block element.
     */
    public function begin(): string
    {
        parent::begin();

        $hiddenInputs = $this->renderHiddenInput();

        $attributes = $this->attributes;
        $attributes['id'] = $this->id;

        $html = HtmlBuilder::begin('form', $attributes);

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

            $attributes = $this->attributes;
            $attributes['id'] = $this->id;
            $html = '';

            if ($hiddenInputs !== '') {
                $html = "$hiddenInputs\n";
            }

            return HtmlBuilder::create('form', $html . $this->content, $attributes);
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
