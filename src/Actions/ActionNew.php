<?php

declare(strict_types=1);

namespace Rakoitde\Table\Actions;

use Rakoitde\Table\Enums\Color;

/**
 * This class describes a column.
 */
class ActionNew extends Action
{
    protected string $color = Color::Primary;
    protected string $icon  = 'plus-circle';
    protected string $uri   = '/new';
}
