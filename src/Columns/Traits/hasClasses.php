<?php

declare(strict_types=1);

namespace Rakoitde\Table\Columns\Traits;

use Closure;
use ReflectionFunction;

trait hasClasses
{
    /**
     * array of classes
     */
    private array $classes = [];

    private array $classQueries;

    /**
     * default focus of class
     */
    private string $tfocus = 'tbody';

    public function setClass()
    {
        $this->classes = [];
    }

    /**
     * Adds a class to array.
     *
     * @param string  $class  The class
     * @param ?string $tfocus The tfocus
     *
     * @return self    ( description_of_the_return_value )
     */
    public function addClass($class, $tfocus = ['thead', 'tbody', 'tfoot']): self
    {
        if (is_object($class) && get_class($class) === 'Closure') {
            $this->classQueries[] = $class;

            return $this;
        }

        $classes = explode(' ', $class);
        $tfocus ??= $this->tfocus;
        $tfocus = is_string($tfocus) ? (array) $tfocus : $tfocus;

        foreach ($classes as $class) {
            foreach ($tfocus as $t) {
                $this->classes[$t][] = $class;
            }
        }

        return $this;
    }

    /**
     * Adds classes.
     *
     * @param array $classes The classes
     * @param      <type>  $tfocus   The tfocus
     */
    public function addClasses($classes, $tfocus = ['thead', 'tbody', 'tfoot']): self
    {
        foreach ($classes as $class) {
            $this->addClass($class, $tfocus);
        }

        return $this;
    }

    /**
     * Gets the classes as string
     *
     * @param string $tfocus The tfocus
     *
     * @return string The classes.
     */
    public function getClasses(?string $tfocus = 'tbody'): string
    {
        $classes = $this->classes[$tfocus] ?? [];

        if ($tfocus === 'tbody') {
            $queryClasses = $this->getClassesFromQueries();

            $classes = array_merge($queryClasses, $classes);
        }

        return implode(' ', $classes);
    }

    public function getClassesFromQueries(): array
    {
        if (! isset($this->classQueries) || ! isset($this->row)) {
            return [];
        }

        $classQueries = [];

        foreach ($this->classQueries as $classQuery) {
            $reflector = new ReflectionFunction($classQuery);

            $classes = $classQuery($this->row);
            $classes = is_string($classes) ? [$classes] : $classes;

            $classQueries = array_merge($classQueries, $classes);
        }

        return $classQueries;
    }

    public function classQuery(?Closure $query): self
    {
        $this->classQuery = $query;

        return $this;
    }
}
