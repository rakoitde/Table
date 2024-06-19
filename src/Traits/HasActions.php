<?php

declare(strict_types=1);

namespace Rakoitde\Table\Traits;

trait hasActions
{
    protected bool $has_actions = false;
    protected array $actions;

    public function actions(...$params): self
    {
        $actions = is_array($params[0]) ? $params[0] : $params;

        $options = is_array($params[0]) ? array_slice($params, 1) : [];

        foreach ($actions as $action) {
            $this->has_actions = true;
            $this->actions[]   = $action->Options($options)->Url($this->getUri());
        }

        return $this;
    }

    public function getActions()
    {
        return $this->actions;
    }

    public function hasActions()
    {
        return $this->has_actions;
    }
}
