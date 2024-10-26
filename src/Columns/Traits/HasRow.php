<?php

declare(strict_types=1);

namespace Rakoitde\Table\Columns\Traits;

use CodeIgniter\Entity\Entity;

trait HasRow
{
    /**
     * row
     */
    protected $row;

    /**
     * Custom Row
     *
     * @param Entity $row The row
     */
    public function row(Entity $row): self
    {
        $this->row = $row;

        return $this;
    }

    /**
     * Gets the row.
     *
     * @return Entity The row.
     */
    public function getRow(): Entity
    {
        return $this->row;
    }
}
