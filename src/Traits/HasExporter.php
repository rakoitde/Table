<?php

declare(strict_types=1);

namespace Rakoitde\Table\Traits;

trait HasExporter
{
    protected bool $has_exporter;

    public function exporter(bool $has_exporter): self
    {
        $this->has_exporter = $has_exporter;

        return $this;
    }

    public function hasExporter(): bool
    {
        return $this->has_exporter ?? false;
    }
}
