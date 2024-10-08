<?php

declare(strict_types=1);

namespace Rakoitde\Table\Columns\Traits;

trait hasSortable
{
    /**
     * sortable
     */
    protected bool $sortable;

    /**
     * sort direction
     */
    protected string $sortdirectionByDefault;

    /**
     * next sort direction
     */
    protected string $sortnextdirection;

    /**
     * Mark column as sortable
     *
     * @param bool   $sortable  The sortable
     * @param string $direction The direction
     */
    public function sortable(bool $sortable = true, string $sortdirectionByDefault = ''): self
    {
        $this->sortable               = $sortable;
        $this->sortdirectionByDefault = $sortdirectionByDefault;

        return $this;
    }

    /**
     * Determines if the column is sortable.
     *
     * @return bool True if sortable, False otherwise.
     */
    public function isSortable(): bool
    {
        return $this->sortable ?? false;
    }

    /**
     * Gets the direction.
     *
     * @return string The direction.
     */
    public function getDirection(): string
    {
        $dotPath = 'table.' . $this->getTable()->getId() . '.sort.' . $this->getName();

        helper('array');
        $direction = dot_array_search($dotPath, request()->getGet()) ?? '';

        return in_array($direction, ['asc', 'desc', ''], true) ? $direction : '';
    }

    /**
     * Gets the next direction.
     *
     * @return string The next direction.
     */
    public function getNextDirection(): string
    {
        $directions = ['' => 'asc', 'asc' => 'desc', 'desc' => ''];

        return $directions[$this->getDirection()];
    }

    public function getDirectionIcon(): string
    {
        return $this->config->sorted_icon[$this->getDirection()];
    }

    public function getDirectionQuery(): string
    {
        return '?' . $this->config->sortvar . '[' . $this->fieldname . ']=' . $this->getNextDirection();
    }
}
