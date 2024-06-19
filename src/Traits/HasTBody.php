<?php

declare(strict_types=1);

namespace Rakoitde\Table\Traits;

use stdClass;

trait hasTBody
{
    public function tBody()
    {
        $data = [
            'tbody' => new stdClass(),
        ];

        return view($this->config->views['tbody'], $data);
    }
}
