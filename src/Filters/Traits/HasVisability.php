<?php

declare(strict_types=1);

namespace Rakoitde\Table\Filters\Traits;

trait HasVisability
{
    protected bool $isVisible = true;
    protected bool $toggleable;
    protected bool $shown;

    public function visible(bool $isVisible = true): self
    {
        $this->isVisible = $isVisible;

        return $this;
    }

    public function isVisible()
    {
        return true === $this->isVisible;
    }
}
