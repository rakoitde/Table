<?php

declare(strict_types=1);

namespace Rakoitde\Table\Traits;

use Closure;

trait hasQuery
{
    protected $_query;

    /**
     * Sets the table id
     *
     * @param string $query The query
     */
    public function query(Closure $query): self
    {
        $this->_query = $query;

        return $this;
    }

    public function hasQuery(): bool
    {
        return isset($this->_query);
    }

    public function getQuery(): Closure
    {
        return $this->_query;
    }

    public function runQuery($query)
    {
        if (! $this->HasQuery()) {
            return $query;
        }
        $_query = $this->_query;

        return $_query($query);
    }
}
