<?php

declare(strict_types=1);

namespace Rakoitde\Table\BulkActions;

use Rakoitde\Table\Actions\Enums\Color;

/**
 * This class describes a column.
 */
class BulkActionShow extends BulkAction
{
    protected string $color = Color::OutlineSecondary;
    protected string $icon  = 'binoculars';
    protected string $uri   = '{id}';
}
