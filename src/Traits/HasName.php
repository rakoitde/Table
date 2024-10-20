<?php

declare(strict_types=1);

namespace Rakoitde\Table\Traits;

trait HasName
{
    protected string $name = 'table';

    /**
     * Sets the table name
     *
     * @param string $name The identifier
     */
    public function name(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name . '[' . $this->getId() . ']';
    }
}
