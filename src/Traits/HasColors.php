<?php

declare(strict_types=1);

namespace Rakoitde\Table\Traits;

trait HasColors
{
    /**
     * { function_description }
     *
     * @return self  ( description_of_the_return_value )
     */
    public function dark(): self
    {
        $this->addClass('table-dark');

        return $this;
    }

    /**
     * { function_description }
     *
     * @return self  ( description_of_the_return_value )
     */
    public function light(): self
    {
        $this->addClass('table-light');

        return $this;
    }
}
