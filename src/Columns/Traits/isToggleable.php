<?php

declare(strict_types=1);

namespace Rakoitde\Table\Columns\Traits;

trait isToggleable
{
    protected bool $isToggleable      = false;
    protected bool $isHiddenByDefault = false;

    /**
     * Sets the table formId
     *
     * @param string $formId The form attribute
     */
    public function toggleable(bool $isToggleable = true, bool $isHiddenByDefault = false): self
    {
        $this->isToggleable      = $isToggleable;
        $this->isHiddenByDefault = $isHiddenByDefault;

        return $this;
    }

    public function isToggleable()
    {
        return $this->isToggleable;
    }

    public function getToggleCheckedAttribute(): string
    {
        return $this->wasToggleChecked() ? ' checked' : '';
    }

    public function getToggleHiddenAttribute(): string
    {
        if (! $this->isToggleable()) {
            return '';
        }

        return $this->wasToggleChecked() ? '' : ' hidden';
    }

    public function wasToggleChecked(): bool
    {
        helper('array');

        $path = [
            'table',
            $this->table->getId(),
            'toggled',
        ];

        $dotPath = implode('.', $path);

        if (dot_array_search($dotPath, request()->getGet()) !== '1') {
            return ! $this->isHiddenByDefault;
        }

        $path = [
            'table',
            $this->table->getId(),
            'toggle',
            $this->getField(),
        ];

        $dotPath = implode('.', $path);

        return dot_array_search($dotPath, request()->getGet()) === '1' ? true : false;
    }
}
