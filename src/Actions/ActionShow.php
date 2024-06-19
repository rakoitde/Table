<?php

declare(strict_types=1);

namespace Rakoitde\Table\Actions;

use Rakoitde\Table\Actions\Enums\Color;

/**
 * This class describes a column.
 */
class ActionShow extends Action
{
    protected string $color = Color::OutlineSecondary;
    protected string $icon  = 'binoculars';
    protected string $uri   = '{id}';
}
