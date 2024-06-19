<?php

declare(strict_types=1);

namespace Rakoitde\Table\Columns;

/**
 * This class describes a column.
 */
class ColumnIcon extends Column
{
    use Traits\hasBoolean;
    use Traits\hasIcon;

    /**
     * Gets the value for icon columns.
     *
     * @return string The value.
     */
    public function getValue(): string
    {
        $fieldname = $this->getFieldname();
        $value     = $this->GetRow()->{$fieldname};

        if (! isset($value) || null === $value) {
            return $this->getNullIconAsValue();
        }

        $value = match (true) {
            $this->boolean => $this->getBooleanIcon(),
            default        => $this->getIconAsValue(),
        };

        if ($this->hasUrl()) {
            return $this->getUrlTag($value);
        }

        return $value;
    }
}
