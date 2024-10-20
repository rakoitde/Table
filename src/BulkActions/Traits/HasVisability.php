<?php

declare(strict_types=1);

namespace Rakoitde\Table\BulkActions\Traits;

trait HasVisability
{
    protected bool $isVisible = true;
    protected bool $toggleable;
    protected bool $shown;

    /**
     * Sets the table formId
     *
     * @param string $formId The form attribute
     */
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
