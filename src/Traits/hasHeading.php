<?php

declare(strict_types=1);

namespace Rakoitde\Table\Traits;

trait hasHeading
{
    protected string $heading;
    protected string $subheading;

    /**
     * Sets the table id
     *
     * @param string $id The identifier
     */
    public function heading(string $heading): self
    {
        $this->heading = $heading;

        return $this;
    }

    public function getHeading(): string
    {
        return $this->heading ?? '';
    }

    public function hasHeading(): bool
    {
        return isset($this->heading);
    }

    /**
     * Sets the table id
     *
     * @param string $id The identifier
     */
    public function subheading(string $subheading): self
    {
        $this->subheading = $subheading;

        return $this;
    }

    public function getSubheading(): string
    {
        return $this->subheading ?? '';
    }

    public function hasSubheading(): bool
    {
        return isset($this->subheading);
    }
}
