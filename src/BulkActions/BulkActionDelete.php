<?php

declare(strict_types=1);

namespace Rakoitde\Table\BulkActions;

use Rakoitde\Table\Enums\Color;

/**
 * This class describes a column.
 */
class BulkActionDelete extends BulkAction
{
    protected string $color = Color::OutlineDanger;
    protected string $icon  = 'trash';
    protected string $uri   = 'bulk/delete';
}
