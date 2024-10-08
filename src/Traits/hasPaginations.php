<?php

declare(strict_types=1);

namespace Rakoitde\Table\Traits;

use Rakoitde\Table\Pagination\Pagination;

trait hasPaginations
{
    protected int $perpage = 15;
    protected bool $paginated;
    protected ?Pagination $pagination;

    public function paginated(bool $paginated = true): self
    {
        $this->paginated  = $paginated;

        if (! $paginated) {
            return $this;
        }

        $this->pagination = new Pagination($this);

        return $this;
    }

    public function hasPagination(): bool
    {
        return $this->paginated ?? false;
    }

    public function getPagination(): Pagination
    {
        return $this->pagination;
    }

    public function pagination(): string
    {
        return (string) $this->pagination ?? '';
    }
}
