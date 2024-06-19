<?php

declare(strict_types=1);

namespace Rakoitde\Table\Columns\Traits;

trait hasValue
{
    /**
     * label
     */
    protected string $value;

    /**
     * label
     */
    protected string $nullValue = '';

    /**
     * bootstrap text color string without 'text-' for null value
     */
    protected string $nullColor;

    /**
     * Custom Value
     *
     * @param string $value The label
     */
    public function value(string $value): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Gets the value.
     *
     * @return string The value.
     */
    public function getValue(): string
    {
        if ($this->hasText()) {
            return $this->getText();
        }

        $fieldname = $this->getFieldname();

        $value = $this->GetRow()->{$fieldname};

        $formatedValue = $this->formatValue($value);

        if ($this->hasUrl()) {
            return $this->getUrlTag($formatedValue);
        }

        return $formatedValue;
    }

    /**
     * Custom Value
     *
     * @param string $value The label
     */
    public function nullValue(string $nullValue): self
    {
        $this->nullValue = $nullValue;

        return $this;
    }

    /**
     * Gets the nullValue.
     *
     * @return string The nullValue.
     */
    public function getNullValue(): string
    {
        return $this->nullValue;
    }

    /**
     * set true text color for null value
     *
     * @param string $trueColor 'success' for class text-success
     */
    public function nullColor(string $nullColor): self
    {
        $this->nullColor = $nullColor;

        return $this;
    }
}
