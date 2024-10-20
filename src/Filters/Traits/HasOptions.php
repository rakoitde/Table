<?php

declare(strict_types=1);

namespace Rakoitde\Table\Filters\Traits;

/**
 * This class describes a column.
 */
trait HasOptions
{
    protected array $options;
    protected string $options_key;
    protected string $options_template;

    public function options(array $options, string $template = '{id}', string $key = 'id'): self
    {
        $this->options          = $options;
        $this->options_key      = $key;
        $this->options_template = $template;

        return $this;
    }

    public function getOptions(): array
    {
        return $this->options ?? [];
    }

    public function getOptionsAsArray(?array $data): array
    {
        $options = [];

        if (null === $data) {
            $data = [];
        }

        foreach ($this->options as $option) {
            $option = is_object($option) ? $option->toArray() : $option;

            $option['_key']      = $option[$this->options_key];
            $option['_text']     = $this->parseText($this->options_template, $option);
            $option['_selected'] = in_array($option[$this->options_key], $data, true) ? 'selected' : '';

            $options[$option[$this->options_key]] = $option;
        }

        return $options ?? [];
    }

    public function hasOptions()
    {
        return isset($this->options);
    }
}
