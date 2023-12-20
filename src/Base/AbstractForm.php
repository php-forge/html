<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use PHPForge\Html\Attribute;
use PHPForge\Html\HtmlBuilder;
use PHPForge\Html\Input\Hidden;
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
    use Attribute\Custom\HasAttributes;
    use Attribute\Custom\HasContent;
    use Attribute\Custom\HasCsrf;
    use Attribute\HasClass;
    use Attribute\HasId;
    use Attribute\HasLang;
    use Attribute\HasStyle;
    use Attribute\HasTitle;
    use Attribute\Input\HasName;
    use Attribute\Tag\CanBeNoValidate;
    use Attribute\Tag\HasAction;
    use Attribute\Tag\HasEnctype;
    use Attribute\Tag\HasMethod;

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
