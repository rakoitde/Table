<?php

declare(strict_types=1);

namespace Rakoitde\Table\Filters\Traits;

/**
 * This class describes a column.
 */
trait hasFilterOptions
{
    protected array $filterOptions;

    public function filterOptions($filterOptions): self
    {
        $this->filterOptions = $filterOptions;

        if (isset($filterOptions['size'])) {
            $this->size = $filterOptions['size'];
        }

        return $this;
    }
}
