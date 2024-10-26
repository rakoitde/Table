<?php

declare(strict_types=1);

namespace Rakoitde\Table\Columns\Traits;

trait HasUrl
{
    /**
     * url
     */
    protected string $url;

    /**
     * target
     */
    protected string $target;

    /**
     * label
     */
    protected string $nullUrl = '';

    /**
     * Custom Url
     *
     * @param string $url The label
     */
    public function url(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function openInNewTab(): self
    {
        $this->target = '_blank';

        return $this;
    }

    /**
     * Gets the url.
     *
     * @return string The url.
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    public function getTargetAttribute()
    {
        if (isset($this->target)) {
            return 'target="' . $this->target . '"';
        }

        return '';
    }

    public function getUrlTag(string $value): string
    {
        $url    = $this->parseText($this->getUrl());
        $target = $this->getTargetAttribute();

        return '<a href="' . $url . '" ' . $target . '>' . $value . '</a>';
    }

    public function hasUrl(): bool
    {
        return isset($this->url);
    }
}
