<?php

declare(strict_types=1);

namespace PHPForge\Html\Input;

interface InputInterface
{
    public function attributes(array $values): static;

    public function class(string $value): static;

    public function getId(): string|null;

    public function id(string|null $value): static;

    public function name(string $value): static;

    public function render(): string;

    public function value(mixed $value): static;
}
