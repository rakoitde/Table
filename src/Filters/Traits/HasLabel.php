<?php

declare(strict_types=1);

namespace Rakoitde\Table\Filters\Traits;

trait HasLabel
{
    protected string $label;

    public function label(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getLabel(): string
    {
        return $this->label ?? '';
    }
}
