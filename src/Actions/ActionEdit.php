<?php

declare(strict_types=1);

namespace Rakoitde\Table\Actions;

use Rakoitde\Table\Enums\Color;

/**
 * This class describes a column.
 */
class ActionEdit extends Action
{
    protected string $color = Color::OutlinePrimary;
    protected string $icon  = 'pencil';
    protected string $uri   = '/{id}/edit';
}
