<?php

declare(strict_types=1);

namespace Rakoitde\Table\Traits;

trait HasLabel
{
    protected string $label;

    public function label(string $label)
    {
        $this->label = $label;
    }

    public function getLabel(): string
    {
        return $this->label ?? '';
    }
}
