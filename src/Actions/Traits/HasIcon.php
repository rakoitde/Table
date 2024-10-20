<?php

declare(strict_types=1);

namespace Rakoitde\Table\Actions\Traits;

/**
 * This class describes a column.
 */
trait HasIcon
{
    protected string $icon;
    protected bool $hasIcon     = false;
    protected bool $iconOnly    = false;
    protected string $icon_view = 'Rakoitde\Table\Views\Actions\icon';

    public function icon(?string $icon = null): self
    {
        $this->hasIcon = true;
        $this->icon    = $icon ?: $this->icon;

        return $this;
    }

    public function hasIcon(): bool
    {
        return $this->hasIcon;
    }

    public function iconOnly(?string $icon = null): self
    {
        $this->iconOnly = true;
        $this->Icon($icon);

        return $this;
    }

    public function getIcon(): string
    {
        if (! $this->hasIcon || ! isset($this->icon)) {
            return '';
        }
        $icon = 'bi bi-' . $this->icon;

        return view($this->icon_view, ['icon' => $icon]);
    }
}