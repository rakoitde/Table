<?php

declare(strict_types=1);

namespace Rakoitde\Table\Traits;

trait hasExporter
{
    protected bool $has_exporter;

    /**
     * Sets the table id
     *
     * @param string $id The identifier
     */
    public function exporter(bool $has_exporter): self
    {
        $this->has_exporter = $has_exporter;

        return $this;
    }

    public function hasExporter(): string
    {
        return $this->has_exporter ?? false;
    }
}
