<?php

declare(strict_types=1);

namespace Rakoitde\Table\Traits;

trait hasField
{
    /**
     * fieldname
     */
    public string $fieldname;

    public function field(string $fieldname): self
    {
        $this->fieldname = $fieldname;

        return $this;
    }

    public function hasField(): bool
    {
        return isset($this->fieldname);
    }

    public function getField(): string
    {
        return $this->fieldname ?? '';
    }

    public function getFieldname(): string
    {
        $fieldname = str_contains($this->fieldname, '.') ? explode('.', $this->fieldname)[1] : $this->fieldname;

        return $fieldname ?? '';
    }
}
