<?php

declare(strict_types=1);

namespace Rakoitde\Table\Traits;

trait hasCaption
{
    protected string $caption;

    public function caption(string $caption): self
    {
        $this->caption = $caption;

        return $this;
    }

    public function hasCaption(): bool
    {
        return isset($this->caption);
    }

    public function getCaption(): string
    {
        return $this->caption ?? '';
    }
}
