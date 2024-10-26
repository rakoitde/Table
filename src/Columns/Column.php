<?php

declare(strict_types=1);

namespace Rakoitde\Table\Columns;

use Config\Services;
use Rakoitde\Table\Traits as TableTraits;

/**
 * This class describes a column.
 */
abstract class Column
{
    use TableTraits\HasField;
    use Traits\HasVisability;
    use Traits\HasTable;
    use Traits\HasSortable;
    use Traits\HasFormat;
    use Traits\HasLabel;
    use Traits\HasValue;
    use Traits\HasName;
    use Traits\HasTableId;
    use Traits\HasUrl;
    use Traits\HasText;
    use Traits\HasClasses;
    use Traits\HasRow;
    use Traits\IsSearchable;
    use Traits\IsToggleable;

    public static function make(?string $field = null)
    {
        $static = new static();
        if (isset($field)) {
            $static->Field($field);
            $static->Name($field);
            $static->Label(ucfirst($field));
        }

        return $static;
    }

    /**
     * Constructs a new instance.
     *
     * @param string $columnname The columnname
     */
    public function __construct()
    {
        $this->config = Config('Rakoitde\\Table\\Config\\Table');
        $this->request = Services::request();
        $this->parser  = Services::parser();
    }
}
