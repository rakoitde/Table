<?php

declare(strict_types=1);

namespace Rakoitde\Table\Filters;

use CodeIgniter\Model;

/**
 * This class describes a column.
 */
abstract class Filter
{
    use Traits\hasFilterOptions;
    use Traits\hasId;
    use Traits\hasName;
    use Traits\hasLabel;
    use Traits\hasFormId;
    use Traits\hasTableId;
    use Traits\hasValue;
    use Traits\hasQuery;
    use Traits\hasVisability;

    protected string $view = 'Rakoitde\Table\Views\Filters\text';
    protected string $size;

    public static function make(string $id)
    {
        $static = new static();
        $static->id($id);
        $static->Name($id);
        $static->Label(ucfirst($id));

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
        return ! ($this->getValue() === '' || null === $this->getValue());
    }

    public function runQuery($query)
    {
        if (! $this->getValue()) {
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
