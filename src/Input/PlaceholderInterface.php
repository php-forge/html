<?php

declare(strict_types=1);

namespace PHPForge\Html\Input;

interface PlaceholderInterface
{
    public function placeholder(string $value): static;
}
