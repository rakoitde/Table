<?php

declare(strict_types=1);

namespace Rakoitde\Table\Traits;

trait IsSearchable
{
	protected bool $isSearchable;

    public function isSearchable(): bool
    {

        if (!$this->hasColumns()) { return false; }

        foreach ($this->getColumns() as $column) {

            if ($column->isSearchable()) {
                return true;
            }

        }

        return false;
    }

    /**
     * if there are searchable columns, the model will be searched by the affected fields
     */
    public function searchModel()
    {

        if (! $this->hasSearchableFields) { return; }

        $search = $this->getSearchString();
        if ($search == '') { return; }

        $search = trim(str_replace("*", "%", $search));
        $segments = preg_split("/[\s,]+|[.]+/", $search);
        
        foreach ($segments as $segment) {

            $this->model->groupStart();

            foreach ($this->getColumns() as $column) {

                if (! $column->isSearchable()) { continue; }; 
                
                foreach ($column->getSearchableFields() as $field) {

                    $this->model->orLike($field, str_replace('*', '%', $segment));

                }
            }

            $this->model->groupEnd();
        }
    }
}