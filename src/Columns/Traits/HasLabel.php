<?php

declare(strict_types=1);

namespace Rakoitde\Table\Columns\Traits;

trait HasLabel
{
    /**
     * label
     */
    protected string $label;

    /**
     * Custom Label
     *
     * @param string $label The label
     */
    public function label(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Gets the label.
     *
     * @return string The label.
     */
    public function getLabel(): string
    {
        return $this->label;
    }
}
