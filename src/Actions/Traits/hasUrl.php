<?php

declare(strict_types=1);

namespace Rakoitde\Table\Actions\Traits;

/**
 * This class describes a column.
 */
trait hasUrl
{

    protected string $url;

    protected string $defaultUrl;

    protected string $uri;

    /**
     * target
     */
    protected string $target;

    /**
     * [url description]
     * @param  string $url [description]
     * @return [type]      [description]
     */
    public function url(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * [getUrl description]
     * @param  string $suburi [description]
     * @return [type]         [description]
     */
    public function getUrl(?string $suburi = null): string
    {
        $url = $this->url ?? $this->getDefaultUrl() ?? '';
        $url = $this->parseText($url);
        #$url .= str_ends_with($this->url ?? '', '/') || str_starts_with($this->uri ?? '', '/') ? '' : '/';
        $url .= isset($this->uri) ? $this->parseText($this->uri) : '';
        $url .= $suburi ? '/' . $this->parseText($suburi) : '';

        return $url;
    }

    /**
     * [defaultUrl description]
     * @param  string $defaultUrl [description]
     * @return [type]             [description]
     */
    public function defaultUrl(string $defaultUrl): self
    {
        $this->defaultUrl = $defaultUrl;

        return $this;
    }

    /**
     * [getDefaultUrl description]
     * @return [type] [description]
     */
    public function getDefaultUrl(): ?string
    {
        return $this->parseText($this->defaultUrl) ?? '';
    }

    /**
     * [uri description]
     * @param  [type] $uri [description]
     * @return [type]      [description]
     */
    public function uri($uri): self
    {
        $this->uri = $uri;
        $this->tag = 'a';

        return $this;
    }

    public function openInNewTab(): self
    {
        $this->target = '_blank';

        return $this;
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
