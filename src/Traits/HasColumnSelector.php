<?php

declare(strict_types=1);

namespace Rakoitde\Table\Traits;

trait HasColumnSelector
{
    protected bool $has_column_selector;

    /**
     * Sets the table id
     *
     * @param string $id The identifier
     */
    public function columnSelector(bool $columnSelector): self
    {
        $this->has_column_selector = $ColumnSelector;

        return $this;
    }

    public function hasColumnSelector(): string
    {
        return $this->has_column_selector ?? false;
    }
}
