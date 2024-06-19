<?php

declare(strict_types=1);

namespace Rakoitde\Table\Columns\Traits;

use Rakoitde\Table\Table;

trait isSearchable
{
    public bool $isSearchable = false;

    /**
     * Sets the table formId
     *
     * @param string $formId The form attribute
     */
    public function searchable(bool $isSearchable = true): self
    {
        $this->isSearchable = $isSearchable;

        return $this;
    }

    public function isSearchable(): bool
    {
        return $this->isSearchable;
    }
}
