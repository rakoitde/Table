<?php

declare(strict_types=1);

namespace Rakoitde\Table\Traits;

trait HasFilters
{
    protected bool $has_filters = false;
    protected array $filters;

    public function filters(...$params): self
    {
        $filters = is_array($params[0]) ? $params[0] : $params;

        $options = is_array($params[0]) ? array_slice($params, 1) : [];

        foreach ($filters as $filter) {
            $this->has_filters               = true;
            $this->filters[$filter->getId()] = $filter
                ->FilterOptions($options)
                ->TableId($this->getId())
                ->FormId('form_' . $this->getId());
        }

        return $this;
    }

    public function getFilters()
    {
        // set table id
        foreach ($this->filters as $filter) {
            $this->filters[$filter->getId()]->TableId($this->getId());
        }

        return $this->filters;
    }

    public function hasFilters()
    {
        return $this->has_filters;
    }

    public function filterModel()
    {
        if (! $this->hasFilters()) {
            return;
        }

        foreach ($this->filters as $filter) {
            $filter->runQuery($this->model);
        }
    }

    public function isFiltered(): bool
    {
        if (! isset($this->filters)) {
            return false;
        }

        foreach ($this->filters as $filter) {
            if ($filter->isFiltered()) {
                // d($filter, $filter->getValue(), $filter->isFiltered());
                return true;
            }
        }

        return false;
    }
}
