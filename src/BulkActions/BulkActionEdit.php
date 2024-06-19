<?php

declare(strict_types=1);

namespace Rakoitde\Table\BulkActions;

use Rakoitde\Table\Actions\Enums\Color;

/**
 * This class describes a column.
 */
class BulkActionEdit extends BulkAction
{
    protected string $color = Color::OutlinePrimary;
    protected string $icon  = 'pencil';
    protected string $uri   = '{id}/edit';
}
