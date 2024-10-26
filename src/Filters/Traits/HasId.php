<?php

declare(strict_types=1);

namespace Rakoitde\Table\Filters\Traits;

trait HasId
{
    protected string $id;

    /**
     * Sets the table id
     *
     * @param string $id The identifier
     */
    public function id(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getId(): string
    {
        // $this->model is Model
        return $this->id ?? $this->model->table;
    }
}
