<?php

declare(strict_types=1);

namespace Rakoitde\Table\Filters\Traits;

trait HasValue
{
    protected string $value;

    /**
     * Sets the table name
     *
     * @param string $value The name attribute
     */
    public function value(string $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getValue(?string $subKey = null)
    {
        $path = [
            'table',
            $this->getTableId(),
            'filter',
            $this->getName(),
        ];

        if (isset($subKey)) {
            $path[] = $subKey;
        }

        $dotPath = implode('.', $path);

        helper('array');

        return dot_array_search($dotPath, request()->getGet());
    }

    public function getValueAttribute(?string $subKey = null): string
    {
        $value = $this->getValue($subKey);

        return 'value ="' . $value . '"';
    }
}
