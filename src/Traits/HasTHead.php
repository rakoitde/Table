<?php

declare(strict_types=1);

namespace Rakoitde\Table\Traits;

use stdClass;

trait hasTHead
{
    public function tHead()
    {
        $data = [
            'thead'   => new stdClass(),
            'columns' => $this->getColumns(),
        ];

        return view($this->config->views['thead'], $data);
    }
}
