<?php

declare(strict_types=1);

namespace Rakoitde\Table\Traits;

use stdClass;

trait HasTFoot
{
    public function tFoot()
    {
        $data = [
            'tfoot' => new stdClass(),
        ];

        return view($this->config->views['tfoot'], $data);
    }
}
