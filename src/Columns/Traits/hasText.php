<?php

declare(strict_types=1);

namespace Rakoitde\Table\Columns\Traits;

trait hasText
{
    /**
     * text
     */
    protected string $text;

    protected bool $hasText = false;

    /**
     * Custom Text
     *
     * @param string $text The text
     */
    public function text(string $text): self
    {
        $this->text    = $text;
        $this->hasText = true;

        return $this;
    }

    public function hasText()
    {
        return $this->hasText;
    }

    /**
     * Gets the text.
     *
     * @return string The text.
     */
    public function getText(): string
    {
        return $this->parseText($this->text);
    }

    public function parseText(string $text): string
    {
        if (! isset($this->row)) {
            return $text;
        }

        preg_match_all('/{{1}([^}]+)\}{1}/', $text, $matches);

        foreach ($matches[1] as $key) {
            $text = str_replace('{' . $key . '}', $this->row->{$key} ?? '', $text);
        }

        return $text;
    }
}
