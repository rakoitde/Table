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
    use TableTraits\hasField;
    use Traits\hasVisability;
    use Traits\isToggleable;
    use Traits\hasTable;
    use Traits\HasSortable;
    use Traits\hasFormat;
    use Traits\hasLabel;
    use Traits\hasValue;
    use Traits\hasName;
    use Traits\hasTableId;
    use Traits\isSearchable;
    use Traits\hasUrl;
    use Traits\hasText;
    use Traits\hasClasses;
    use Traits\hasRow;

    /**
     * Field instance
     */
    protected Field $field;

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
        $this->config   = Config('Rakoitde\\Table\\Config\\Table');
        $this->template = config('Rakoitde\\Table\\Config\\' . $this->config->templatename);

        $this->request = Services::request();
        $this->parser  = Services::parser();
    }
}
