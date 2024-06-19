<?php

declare(strict_types=1);

namespace Rakoitde\Table\Traits;

trait hasModel
{
    protected $model;

    public function model($model): self
    {
        if (is_string($model)) {
            $this->model = model($model);
        } elseif (is_object($model)) {
            $this->model = $model;
        } else {
            throw TableException::forWrongModelType();
        }
        if ($this->model === null) {
            throw TableException::forNoModel();
        }

        return $this;
    }

    public function hasModel()
    {
        return isset($this->model);
    }

    public function getModel()
    {
        return $this->model ?? '';
    }
}
