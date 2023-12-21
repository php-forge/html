<?php

declare(strict_types=1);

namespace PHPForge\Html\Input;

interface RuleHtmlByAttribute
{
    /**
     * @param string $attribute The attribute name.
     *
     * @return array The rule validation for the specified attribute.
     */
    public function getRuleHtmlByAttribute(string $attribute): array;
}
