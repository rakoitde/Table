<?php

declare(strict_types=1);

namespace Rakoitde\Table\Actions;

use App\Entities\CompanyEntity;
use ReflectionFunction;

/**
 * This class describes a column.
 */
class Action
{
    use Traits\hasConfirmation;
    use Traits\hasIcon;
    use Traits\hasUrl;
    use Traits\hasOptions;
    use Traits\hasVisability;
    use Traits\hasColor;

    protected string $tag = 'a';
    protected string $id;
    protected string $name;
    protected string $text;
    protected string $view  = 'Rakoitde\Table\Views\Actions\button';
    protected string $class = 'btn';
    protected string $size;
    protected string $target;
    protected $row;
    protected array $rowArray;
    protected $parser;

    public function text(string $text): self
    {
        $this->text     = $text;
        $this->iconOnly = false;

        return $this;
    }

    public function getText(): string
    {
        if ($this->iconOnly) {
            return $this->getIcon();
        }

        return $this->getIcon() . $this->parseText($this->text ?? '');
    }

    public function row($row): self
    {
        $this->row = $row;

        return $this;
    }

    public function rowArray($rowArray): self
    {
        $this->rowArray = $rowArray;

        return $this;
    }

    public function getParser()
    {
        return $this->parser ?? \Config\Services::parser();
    }

    public function parseText(string $text): string
    {
        preg_match_all('/{{1}([^}]+)\}{1}/', $text, $matches);

        foreach ($matches[1] as $key) {
            if (isset($this->row)) {
                $text = str_replace('{' . $key . '}', $this->row->{$key} ?? '', $text);
            }
            $text = str_replace('{' . $key . '}', dot_array_search($key, service('request')->getGet()) ?? '', $text);
        }

        return $text;
    }

    public function ___testFunction()
    {
        if (is_callable($this->url)) {
            $refFunction = new ReflectionFunction($this->url);
            $parameters  = $refFunction->getParameters();

            foreach ($parameters as $parameter) {
                d($parameter, $parameter->getType(), $parameter->getType()->getName());
            }

            // d($refFunction, $parameters, $refFunction->getClosure());

            $validParameters = [];

            foreach ($parameters as $parameter) {
                $validParameters[$parameter->getName()] = $this->row ?? new CompanyEntity();
            }

            $result = $refFunction->invoke(...$validParameters);

            d($result->toArray());
        }
    }

    public static function make(string $id)
    {
        $static       = new static();
        $static->id   = $id;
        $static->name = $id;
        $static->text = $id;

        return $static;
    }

    private function getClasses()
    {
        return trim(
            implode(
                ' ',
                array_merge(
                    explode(' ', $this->class ?? ''),
                    explode(' ', $this->getColor('btn-') ?? ''),
                    explode(' ', $this->size ?? ''),
                )
            )
        );
    }

    public function getHref(): string
    {
        return $this->tag === 'a' ? ' href="' . $this->getUrl() . '"' : '';
    }

    public function getData(): array
    {
        return [
            'action'  => $this,
            'tag'     => $this->tag,
            'id'      => $this->id,
            'name'    => $this->name,
            'href'    => $this->getHref(),
            'text'    => $this->getText(),
            'color'   => $this->getColor('btn-'),
            'classes' => $this->getClasses(),
            'toggler' => $this->getConfirmationToggler(),
        ];
    }

    public function __toString()
    {
        return view($this->view, $this->getData());
    }
}
