<?php

declare(strict_types=1);

namespace Rakoitde\Table\Traits;

trait HasToolbarActions
{
    protected bool $has_toolbar_actions = false;
    protected array $toolbar_actions;

    public function toolbarActions(...$params): self
    {
        $actions = is_array($params[0]) ? $params[0] : $params;

        $options = is_array($params[0]) ? array_slice($params, 1) : [];

        foreach ($actions as $action) {
            $this->has_toolbar_actions = true;
            $this->toolbar_actions[]   = $action
                ->Options($options)
                ->defaultUrl($this->getUri());
        }

        return $this;
    }

    public function getToolbarActions()
    {
        return $this->toolbar_actions;
    }

    public function hasToolbarActions()
    {
        return $this->has_toolbar_actions;
    }
}
