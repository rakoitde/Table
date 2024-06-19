<?php

declare(strict_types=1);

namespace Rakoitde\Table\Filters;

use CodeIgniter\Model;

/**
 * This class describes a column.
 */
class FilterSelect extends Filter
{
    use Traits\HasOptions;
    use Traits\HasParser;
    use Traits\HasMultiple;

    protected string $view = 'Rakoitde\Table\Views\Filters\select';

    protected function _init()
    {
        $this->_query = static fn (Model $query, string $id, $value) => $query->whereIn($id, $value);
    }
}
