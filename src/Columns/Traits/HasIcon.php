<?php

declare(strict_types=1);

namespace Rakoitde\Table\Columns\Traits;

use Rakoitde\Table\Enums\IconPosition;

trait HasIcon
{
    /**
     * bootstrap icon string without 'bi-'
     */
    protected string $icon = '';

    /**
     * icon position
     *
     * IconPosition::Before
     * IconPosition::After
     */
    protected string $iconPosition = IconPosition::Before;

    /**
     * bootstrap icon string without 'bi-' for null value
     */
    protected string $nullIcon;

    /**
     * bootstrap icon string without 'bi-' for true value
     */
    protected string $trueIcon;

    /**
     * bootstrap icon string without 'bi-' for false value
     */
    protected string $falseIcon;

    /**
     * bootstrap text color string without 'text-'
     */
    protected string $iconColor;

    /**
     * icon view
     */
    protected string $icon_view = 'Rakoitde\Table\Views\Actions\icon';

    /**
     * set bootstrap icon string
     *
     * @param string $icon bootstrap icon string without bi and bi-
     */
    public function icon(string $icon): self
    {
        $icon       = str_starts_with($icon, 'bi ') ? substr($icon, 3) : $icon;
        $icon       = str_starts_with($icon, 'bi-') ? substr($icon, 3) : $icon;
        $icon       = str_contains($icon, ' bi ') ? str_replace(' bi ', '', $icon) : $icon;
        $icon       = str_contains($icon, ' bi-') ? str_replace(' bi-', '', $icon) : $icon;
        $this->icon = $icon;

        return $this;
    }

    /**
     * set bootstrap icon string for null value
     *
     * @param string $icon bootstrap icon string without bi and bi-
     */
    public function nullIcon(string $icon): self
    {
        $icon           = str_starts_with($icon, 'bi ') ? substr($icon, 3) : $icon;
        $icon           = str_starts_with($icon, 'bi-') ? substr($icon, 3) : $icon;
        $icon           = str_contains($icon, ' bi ') ? str_replace(' bi ', '', $icon) : $icon;
        $icon           = str_contains($icon, ' bi-') ? str_replace(' bi-', '', $icon) : $icon;
        $this->nullIcon = $icon;

        return $this;
    }

    /**
     * get bootstrap icon string
     *
     * @return string bootstrap icon string
     */
    public function getIcon(): string
    {
        return 'bi bi-' . $this->icon;
    }

    /**
     * get bootstrap icon string
     *
     * @param mixed $iconPosition
     *
     * @return string bootstrap icon string
     */
    public function getIconTag($iconPosition = IconPosition::Before): string
    {
        if (! isset($this->iconPosition) || $this->iconPosition !== $iconPosition) {
            return '';
        }

        $iconColor = ($this->getIconColor() === '') ? '' : ' text-' . $this->getIconColor();

        return view($this->icon_view, ['icon' => $this->getIcon() . $iconColor]);
    }

    public function iconPosition($iconPosition = IconPosition::Before): self
    {
        $this->iconPosition = $iconPosition;

        return $this;
    }

    /**
     * get bootstrap icon string for null value
     *
     * @return string bootstrap icon string
     */
    public function getNullIcon(): string
    {
        return 'bi bi-' . $this->nullIcon;
    }

    /**
     * get bootstrap icon string for true value
     *
     * @return string bootstrap icon string
     */
    public function getTrueIcon(): string
    {
        return $this->config->iconPrefix . ($this->trueIcon ?? $this->config->column['trueIcon']);
    }

    /**
     * get bootstrap icon string for false value
     *
     * @return string bootstrap icon string
     */
    public function getFalseIcon(): string
    {
        return $this->config->iconPrefix . ($this->falseIcon ?? $this->config->column['falseIcon']);
    }

    public function trueIcon(string $trueIcon): self
    {
        $this->trueIcon = $trueIcon;

        return $this;
    }

    public function falseIcon(string $falseIcon): self
    {
        $this->falseIcon = $falseIcon;

        return $this;
    }

    public function iconColor(string $iconColor): self
    {
        $this->iconColor = $iconColor;

        return $this;
    }

    public function getIconColor(): string
    {
        return $this->iconColor ?? '';
    }

    public function getIconAsValue(): string
    {
        $iconColor = ($this->getIconColor() === '') ? '' : ' text-' . $this->getIconColor();

        return view($this->icon_view, ['icon' => $this->getIcon() . $iconColor]);
    }

    public function getNullIconAsValue(): string
    {
        if (! isset($this->nullIcon)) {
            return $this->getNullValue();
        }

        $iconColor = ($this->getNullColor() === '') ? '' : ' text-' . $this->getNullColor();

        return view($this->icon_view, ['icon' => $this->getNullIcon() . $iconColor]);
    }

    public function getBooleanIcon(): string
    {
        $fieldname = $this->getField();

        if (! $fieldname) {
            return '?';
        }

        $icon = isset($this->row->{$fieldname}) && $this->row->{$fieldname} === '1' ? $this->getTrueIcon() : $this->getFalseIcon();

        if ($icon === '') {
            return '';
        }

        $color     = isset($this->row->{$fieldname}) && $this->row->{$fieldname} === '1' ? $this->getTrueColor() ?? '' : $this->getFalseColor() ?? '';
        $iconColor = $color === '' ? '' : ' text-' . $color;

        return view($this->icon_view, ['icon' => $icon . $iconColor]);
    }
}
