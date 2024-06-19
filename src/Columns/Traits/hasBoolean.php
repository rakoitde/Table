<?php

declare(strict_types=1);

namespace Rakoitde\Table\Columns\Traits;

trait hasBoolean
{
    /**
     * Column has bollean value
     */
    protected bool $boolean = false;

    /**
     * bootstrap text color string without 'text-' for true value
     */
    protected string $trueColor;

    /**
     * bootstrap text color string without 'text-' for false value
     */
    protected string $falseColor;

    /**
     * set column value is boolean
     *
     * @param bool|bool $bool default is true
     */
    public function boolean(bool $bool = true): self
    {
        $this->boolean = $bool;

        return $this;
    }

    /**
     * set true text color
     *
     * @param string $trueColor 'success' for class text-success
     */
    public function trueColor(string $trueColor): self
    {
        $this->trueColor = $trueColor;

        return $this;
    }

    /**
     * set false text color
     *
     * @param string $falseColor 'warning' for class text-warning
     */
    public function falseColor(string $falseColor): self
    {
        $this->falseColor = $falseColor;

        return $this;
    }

    /**
     * Gets the bootstrap color string for null value
     *
     * @return string bootstrap color string for null value
     */
    public function getNullColor(): string
    {
        return $this->nullColor ?? $this->GetFalseColor();
    }

    /**
     * set true text color
     *
     * @param string $trueColor 'success' for class text-success
     */
    public function getTrueColor(): string
    {
        return $this->trueColor;
    }

    /**
     * set false text color
     *
     * @param string $falseColor 'warning' for class text-warning
     */
    public function getFalseColor(): string
    {
        return $this->falseColor;
    }
}
