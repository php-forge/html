<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use function count;
use function explode;
use function strtr;

/**
 * Is used by widgets that implement the template method.
 */
trait HasTemplate
{
    protected string $template = '';
    protected array $tokenValue = [];

    /**
     * Set the template.
     *
     * @param string $value The template of the widget.
     *
     * @return static A new instance of the current class with the specified template.
     */
    public function template(string $value): static
    {
        $new = clone $this;
        $new->template = $value;

        return $new;
    }

    public function tokenValue(string $token, string $value): static
    {
        $new = clone $this;
        $new->tokenValue[$token] = $value;

        return $new;
    }

    private function renderTemplate(string $template, array $tokenValues): string
    {
        $result = '';
        $tokens = explode('\n', $template);

        foreach ($tokens as $key => $token) {
            $tokenValue = strtr($token, $tokenValues);

            if ($tokenValue !== '') {
                $result .= $tokenValue;
            }

            if ($result !== '' && $key < count($tokens) - 1) {
                $result = strtr($tokens[$key + 1], $tokenValues) !== '' ? $result . PHP_EOL : $result;
            }
        }

        return $result;
    }
}
