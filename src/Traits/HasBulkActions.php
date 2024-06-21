<?php

declare(strict_types=1);

namespace Rakoitde\Table\Traits;

trait HasBulkActions
{
    protected bool $has_bulk_actions = false;
    protected array $bulk_actions;

    public function bulkActions(...$params): self
    {
        $actions = is_array($params[0]) ? $params[0] : $params;

        $options = is_array($params[0]) ? array_slice($params, 1) : [];

        foreach ($actions as $action) {
            $this->has_bulk_actions = true;
            $this->bulk_actions[]   = $action->Options($options)->Url($this->getUri());
        }

        return $this;
    }

    public function getBulkActions()
    {
        return $this->bulk_actions ?? [];
    }

    public function hasBulkActions()
    {
        return $this->has_bulk_actions;
    }
}
