<?php

declare(strict_types=1);

namespace Rakoitde\Table\Actions;

use Rakoitde\Table\Enums\Color;

/**
 * This class describes a column.
 */
class ActionDelete extends Action
{
    protected string $color = Color::OutlineDanger;
    protected string $icon  = 'trash';
    protected string $uri   = '{id}/delete';
}
