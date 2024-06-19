<?php

declare(strict_types=1);

namespace Rakoitde\Table\Traits;

trait hasClasses
{
    private array $classes;

    /**
     * Adds a class.
     *
     * @param string $class The class
     */
    public function addClass(string $class): self
    {
        foreach (explode(' ', $class) as $class) {
            $this->classes[] = $class;
        }

        return $this;
    }

    /**
     * Gets the classes.
     *
     * @return string The classes.
     */
    public function getClasses(): string
    {
        return isset($this->classes) ? implode(' ', $this->classes) : '';
    }
}
