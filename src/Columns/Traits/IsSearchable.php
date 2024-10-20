<?php

declare(strict_types=1);

namespace Rakoitde\Table\Columns\Traits;

use Rakoitde\Table\Table;

trait IsSearchable
{
    public bool $isSearchable = false;

    private array $searchFields = [];

    /**
     * Sets the table formId
     *
     * @param string $formId The form attribute
     */
    public function searchable(array $searchFields = []): self
    {
        $this->isSearchable = true;
        $this->searchFields = $searchFields;

        return $this;
    }

    public function getSearchableFields(): array
    {
        if (count($this->searchFields) > 0) { 
            return $this->searchFields;
        }

        return [$this->getField()];
    }

    public function isSearchable(): bool
    {
        return $this->isSearchable;
    }
}
