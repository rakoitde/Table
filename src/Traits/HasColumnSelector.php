<?php

declare(strict_types=1);

namespace Rakoitde\Table\Traits;

trait HasColumnSelector
{
    protected bool $has_column_selector;

    public function columnSelector(bool $columnSelector): self
    {
        $this->has_column_selector = $columnSelector;

        return $this;
    }

    public function hasColumnSelector(): bool
    {
        return $this->has_column_selector ?? false;
    }
}
