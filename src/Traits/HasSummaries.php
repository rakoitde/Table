<?php

declare(strict_types=1);

namespace Rakoitde\Table\Traits;

trait HasSummaries
{
    protected bool $has_summaries;

    public function hasSummaries(): bool
    {
        return $this->has_summaries ?? false;
    }
}
