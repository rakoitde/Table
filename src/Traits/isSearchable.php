<?php

declare(strict_types=1);

namespace Rakoitde\Table\Traits;

trait isSearchable
{
	protected bool $isSearchable;

    public function isSearchable(): bool
    {

        if (!$this->hasColumns()) { return false; }

        foreach ($this->getColumns() as $column) {

            if ($column->isSearchable()) {
                return true;
            }

        }

        return false;
    }
}