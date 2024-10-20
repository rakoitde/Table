<?php

declare(strict_types=1);

namespace Rakoitde\Table\BulkActions\Traits;

/**
 * This class describes a column.
 */
trait HasConfirmation
{
    protected bool $requiresConfirmation = false;
    protected string $modalHeading;
    protected string $modalSubheading;
    protected string $modalCloseButton;
    protected string $modalSubmitButton;

    public function requiresConfirmation(bool $requiresConfirmation = true): self
    {
        $this->requiresConfirmation = $requiresConfirmation;

        return $this;
    }

    public function modalHeading(string $text): self
    {
        $this->modalHeading = $text;

        return $this;
    }

    public function modalSubheading(string $text): self
    {
        $this->modalSubheading = $text;

        return $this;
    }

    public function modalCloseButton(string $text): self
    {
        $this->modalCloseButton = $text;

        return $this;
    }

    public function modalSubmitButton(string $text): self
    {
        $this->modalSubmitButton = $text;

        return $this;
    }

    public function getConfirmationToggler(): string
    {
        if ($this->requiresConfirmation !== true) {
            return '';
        }

        $data = [
            'data-confirm-heading'       => $this->modalHeading ?? '',
            'data-confirm-subtitle'      => $this->modalSubheading ?? '',
            'data-confirm-close-button'  => $this->modalCloseButton ?? '',
            'data-confirm-submit-button' => $this->modalSubmitButton ?? '',
        ];

        $dataTags = '';

        foreach ($data as $key => $value) {
            $dataTags .= $key . '="' . $value . '"';
        }

        return 'data-bs-toggle="modal" data-bs-target="#actionModalConfirm" ' . $dataTags;
    }
}
