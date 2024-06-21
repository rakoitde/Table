<?php

declare(strict_types=1);

namespace Rakoitde\Table\Traits;

use stdClass;

trait HasTBody
{
    public function tBody()
    {
        $data = [
            'tbody' => new stdClass(),
        ];

        return view($this->config->views['tbody'], $data);
    }
}
