<?php

declare(strict_types=1);

namespace Rakoitde\Table\Filters\Traits;

use Closure;

trait HasQuery
{
    public $_query;

    /**
     * Sets a query
     *
     * @param Closure $Closure The query
     */
    public function query(Closure $query): self
    {
        $this->_query = $query;

        return $this;
    }

    public function getQuery(): Closure
    {
        return $this->_query;
    }
}
