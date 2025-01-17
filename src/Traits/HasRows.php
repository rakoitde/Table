<?php

declare(strict_types=1);

namespace Rakoitde\Table\Traits;

trait HasRows
{
    protected array $rows;

    public function getRows()
    {
        return $this->model->findAll(10);
    }
}
