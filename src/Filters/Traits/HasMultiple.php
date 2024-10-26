<?php

declare(strict_types=1);

namespace Rakoitde\Table\Filters\Traits;

trait HasMultiple
{
    protected bool $multiple       = false;
    protected string $multipleSize = '5';

    public function multiple(int $multipleSize = 5): self
    {
        $this->multiple     = true;
        $this->multipleSize = (string) $multipleSize;

        return $this;
    }

    public function hasMultiple(): bool
    {
        return $this->multiple;
    }

    public function getMultipleSize(): string
    {
        return $this->multipleSize;
    }

    public function getMultipleAttribute(): string
    {
        return $this->hasMultiple() ? 'multiple' : '';
    }

    public function getMultipleSizeAttribute(): string
    {
        return $this->hasMultiple() ? 'size="' . $this->multipleSize . '"' : '';
    }
}
