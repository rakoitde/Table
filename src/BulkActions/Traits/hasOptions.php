<?php

declare(strict_types=1);

namespace Rakoitde\Table\BulkActions\Traits;

/**
 * This class describes a column.
 */
trait hasOptions
{
    protected array $options;

    public function options($options): self
    {
        $this->options = $options;

        if (isset($options['size'])) {
            $this->size = $options['size'];
        }

        return $this;
    }
}
