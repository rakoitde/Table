<?php

declare(strict_types=1);

namespace Rakoitde\Table\Filters\Traits;

trait HasTableId
{
    protected string $tableId;

    /**
     * Sets the table tableId
     *
     * @param string $tableId The table id
     */
    public function tableId(string $tableId): self
    {
        $this->tableId = $tableId;

        return $this;
    }

    public function getTableId(): string
    {
        return $this->tableId;
    }
}
