<?php

declare(strict_types=1);

namespace Rakoitde\Table\Filters\Traits;

trait hasName
{
    protected string $name;

    /**
     * Sets the table name
     *
     * @param string $name The name attribute
     */
    public function name(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getNameAttribute(?string $subKey = null): string
    {
        $sk = $subKey ? "[{$subKey}]" : '';

        return 'name="table[' . $this->getTableId() . '][filter][' . $this->getName() . ']' . $sk . '"';
    }
}
