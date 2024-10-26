<?php

declare(strict_types=1);

namespace Rakoitde\Table\Columns\Traits;

use Rakoitde\Table\Table;

trait HasTable
{
    public Table $table;

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
