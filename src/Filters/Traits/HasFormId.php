<?php

declare(strict_types=1);

namespace Rakoitde\Table\Filters\Traits;

trait HasFormId
{
    protected string $formId;

    /**
     * Sets the table formId
     *
     * @param string $formId The form attribute
     */
    public function formId(string $formId): self
    {
        $this->formId = $formId;

        return $this;
    }

    public function getFormId(): string
    {
        return $this->formId;
    }
}
