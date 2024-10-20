<?php

declare(strict_types=1);

namespace Rakoitde\Table\Traits;

trait HasAccents
{
    /**
     * { function_description }
     *
     * @return self  ( description_of_the_return_value )
     */
    public function striped(): self
    {
        $this->addClass('table-striped');

        return $this;
    }

    /**
     * { function_description }
     *
     * @return self  ( description_of_the_return_value )
     */
    public function bordered(): self
    {
        $this->addClass('table-bordered');

        return $this;
    }

    /**
     * { function_description }
     *
     * @return self  ( description_of_the_return_value )
     */
    public function borderless(): self
    {
        $this->addClass('table-borderless');

        return $this;
    }

    /**
     * { function_description }
     *
     * @return self  ( description_of_the_return_value )
     */
    public function hover(): self
    {
        $this->addClass('table-hover');

        return $this;
    }
}
