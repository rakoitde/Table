<?php

declare(strict_types=1);

namespace Rakoitde\Table\Traits;

trait hasColumns
{
    protected array $columns;
    protected array $fieldnames;

    public function columns(...$columns): self
    {
        foreach ($columns as $column) {
            $column->Table($this);

            if ($column->IsSearchable()) {
                $this->hasSearchableFields = true;
            }

            if ($column->hasField()) {
                $this->fieldnames[] = $column->getField();
            }
            $this->columns[] = $column;
        }

        return $this;
    }

    public function hasColumns()
    {
        return isset($this->columns);
    }

    public function getColumns()
    {
        return $this->columns ?? [];
    }

    public function getVisibleColumnArray(): array
    {
        $columns = [];

        foreach ($this->columns as $column) {
            if ($column->isVisible()) {
                $columns[$column->getName()] = $column->getLabel();
            }
        }

        return $columns;
    }

    public function hasToggleableColumns(): bool
    {
        foreach ($this->getColumns() as $column) {
            if ($column->isToggleable()) {
                return true;
            }
        }

        return false;
    }
}
