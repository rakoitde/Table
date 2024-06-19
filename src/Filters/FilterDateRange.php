<?php

declare(strict_types=1);

namespace Rakoitde\Table\Filters;

use CodeIgniter\Model;

/**
 * This class describes a column.
 */
class FilterDateRange extends Filter
{
    protected string $view = 'Rakoitde\Table\Views\Filters\date_range';

    public function isFiltered(): bool
    {
        if ($this->getValue('from') !== '' && null !== $this->getValue('from')) {
            return true;
        }

        return (bool) ($this->getValue('to') !== '' && null !== $this->getValue('to'));
    }

    protected function _init()
    {
        $this->_query = static fn (Model $query, string $id, $value) => $query
            ->when($value['from'], static function ($query, $value) use (&$id) {
                $query->where($id . " >= '" . $value . "'");
            })
            ->when($value['to'], static function ($query, $value) use (&$id) {
                $query->where($id . " <= '" . $value . "'");
            });
    }
}
