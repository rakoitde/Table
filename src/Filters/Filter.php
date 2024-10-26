<?php

declare(strict_types=1);

namespace Rakoitde\Table\Filters;

use CodeIgniter\Model;

/**
 * This class describes a column.
 * 
 * @phpstan-consistent-constructor
 */
abstract class Filter
{
    use Traits\HasFilterOptions;
    use Traits\HasId;
    use Traits\HasName;
    use Traits\HasLabel;
    use Traits\HasFormId;
    use Traits\HasTableId;
    use Traits\HasValue;
    use Traits\HasQuery;
    use Traits\HasVisability;

    protected string $view = 'Rakoitde\Table\Views\Filters\text';
    protected string $size;

    public static function make(string $id)
    {
        $static = new static();
        $static->id($id);
        $static->name($id);
        $static->label(ucfirst($id));

        return $static;
    }

    public function getData(): array
    {
        return [
            'filter' => $this,
        ];
    }

    public function __toString()
    {
        return view($this->view, $this->getData());
    }

    public function isFiltered(): bool
    {
        $value = $this->getValue();

        if ($value === false || $value === '' || null === $value) {
            return false;
        }

        return ! (is_array($value) && count($value) === 1 && $value[0] === '');
    }

    public function runQuery($query)
    {
        if (! $this->isFiltered()) {
            return;
        }

        $_query = $this->getQuery();

        return $_query($query, $this->getId(), $this->getValue());
    }

    protected function _init()
    {
        $this->_query = static fn (Model $query, string $id, $value) => $query->like($id, $value ?? '');
    }

    public function __construct()
    {
        $this->_init();
    }
}
