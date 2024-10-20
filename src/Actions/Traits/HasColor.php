<?php

declare(strict_types=1);

namespace Rakoitde\Table\Actions\Traits;

use Rakoitde\Table\Enums\Color;

/**
 * This class describes a column.
 */
trait HasColor
{

    protected string $color = Color::OutlinePrimary;

    public function color(string $color): self
    {
        $this->color = $color;
        return $this;
    }

    public function getColor(string $prefix = ''): string
    {
        return $prefix . ($this->color ?? '');
    }

}
