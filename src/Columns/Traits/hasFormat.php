<?php

declare(strict_types=1);

namespace Rakoitde\Table\Columns\Traits;

trait hasFormat
{
    /**
     * format type
     *
     * @var string
     *
     * text, date, checkbox, int, decimal, float
     */
    protected string $formattype = 'text';

    /**
     * format string
     */
    protected string $format;

    /**
     * set column as numeric
     */
    public function numeric(): self
    {
        $this->formattype = 'int';
        $this->addClass('text-end');

        return $this;
    }

    /**
     * set column as date
     */
    public function date(): self
    {
        $this->formattype = 'date';

        return $this;
    }

    /**
     * set column as datetime
     */
    public function datetime(): self
    {
        $this->formattype = 'datetime';

        return $this;
    }

    /**
     * set column as time
     */
    public function time(): self
    {
        $this->formattype = 'time';

        return $this;
    }

    /**
     * set column as checkbox
     */
    public function checkbox(): self
    {
        $this->formattype = 'checkbox';
        $this->addClass('text-center');

        return $this;
    }

    /**
     * Center
     * adds text-center class on focus
     *
     * @param array $tfocus The tfocus
     *
     * @return self   ( description_of_the_return_value )
     */
    public function center($tfocus = ['tbody', 'thead', 'tfoot']): self
    {
        $this->addClass('text-center', $tfocus);

        return $this;
    }

    /**
     * Right
     * Adds text-right class on focus
     *
     * @param array $tfocus The tfocus
     *
     * @return self   ( description_of_the_return_value )
     */
    public function right($tfocus = ['tbody', 'thead', 'tfoot']): self
    {
        $this->addClass('text-right', $tfocus);

        return $this;
    }

    /**
     * returns the formated value
     *
     * @param mixed $value The value
     *
     * @return mixed formated value
     */
    private function formatValue($value)
    {
        $value = match (true) {
            // string
            is_string($value) => $value,

            // array
            is_array($value) => implode(', ', $value),

            // object of type CodeIgniter\I18n\Time and formattype in ['date','time','datetime']
            is_object($value)
                && get_class($value) === 'CodeIgniter\I18n\Time'
                && in_array($this->formattype, ['date', 'time', 'datetime'], true) => (string) $value->format($this->config->format[$this->formattype]),

            // object of type CodeIgniter\I18n\Time
            is_object($value) && get_class($value) === 'CodeIgniter\I18n\Time' => (string) $value,

            // null
            null === $value => $this->getNullValue(),

            // default
            default => "Type '" . gettype($value) . "' unknown!",
        };

        if ($value === null) {
            return $value;
        }

        $value = $this->formattype === 'currency' ? number_to_currency($value, $this->format) : $value;
        $value = $this->formattype === 'decimal' ? number_format($value, $this->format, ',', '.') : $value;

        return $this->formattype === 'float' ? number_format($value, $this->format, ',', '.') : $value;
    }
}
