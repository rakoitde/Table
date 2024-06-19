<?php

declare(strict_types=1);

namespace Rakoitde\Table\Filters\Traits;

trait hasParser
{
    protected string $parser;

    public function getParser()
    {
        return $this->parser ?? \Config\Services::parser();
    }

    public function parseText(string $text, $data): string
    {
        preg_match_all('/{{1}([^}]+)\}{1}/', $text, $matches);

        if (is_array($data)) {
            foreach ($matches[1] as $key) {
                $text = str_replace('{' . $key . '}', $data[$key] ?? '', $text);
            }
        }

        if (is_object($data)) {
            foreach ($matches[1] as $key) {
                $text = str_replace('{' . $key . '}', $data->{$key} ?? '', $text);
            }
        }

        return $text;
    }
}
