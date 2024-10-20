<?php

declare(strict_types=1);

namespace Rakoitde\Table\Columns\Traits;

use Rakoitde\Table\Table;

trait HasTable
{
    public Table $table;

    /**
     * Sets the table formId
     *
     * @param string $formId The form attribute
     */
    public function table(Table $table): self
    {
        $this->table = $table;

        return $this;
    }

    public function getTable(): Table
    {
        return $this->table;
    }
}
