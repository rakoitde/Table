<?php

declare(strict_types=1);

namespace Rakoitde\Table\Filters;

use CodeIgniter\Model;

/**
 * This class describes a column.
 */
class FilterBool extends Filter
{
    protected string $view = 'Rakoitde\Table\Views\Filters\bool';

    public function isFiltered(): bool
    {
        return $this->getValue() !== 'null' && null !== $this->getValue();
    }

    protected function _init()
    {
        $this->_query = static fn (Model $query, string $id, $value) => $query
            ->when($value === 'true', static function ($query, $value) use (&$id) {
                $query->where($id, '1');
            })
            ->when($value === 'false', static function ($query, $value) use (&$id) {
                $query->groupStart()
                    ->where($id, '0')
                    ->orWhere($id . ' is null')
                    ->groupEnd();
            });
    }
}
