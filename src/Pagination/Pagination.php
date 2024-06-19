<?php

declare(strict_types=1);

namespace Rakoitde\Table\Pagination;

use Rakoitde\Table\Table;

/**
 * This class describes a column.
 */
class Pagination
{
    protected Table $table;
    protected string $alignmentClass = '';
    protected int $totalRows         = 0;
    protected int $maxNumLinks       = 6;
    protected int $perPage           = 10;
    protected int $currentPage;
    protected bool $showFirst = true;
    protected bool $showLast  = true;

    public function setTotalRows($totalRows): self
    {
        $this->totalRows = $totalRows;

        return $this;
    }

    public function getTotalRows(): int
    {
        return $this->totalRows;
    }

    public function getRowPageStart(): int
    {
        return (($this->getCurrentPage() - 1) * $this->getRowsPerPage()) + 1;
    }

    public function getRowPageEnd(): int
    {
        return min((($this->getCurrentPage() - 1) * $this->getRowsPerPage()) + $this->getRowsPerPage(), $this->getTotalRows());
    }

    public function getMaxNumLinks(): int
    {
        return $this->maxNumLinks;
    }

    public function getRowsPerPage(): int
    {
        return $this->perPage ?: 10;
    }

    public function getRowsOffset(): int
    {
        return ($this->getCurrentPage() - 1) * $this->perPage;
    }

    public function getTotalPages(): int
    {
        return (int) (ceil($this->getTotalRows() / $this->getRowsPerPage()));
    }

    public function getPreviousPage(): int
    {
        return $this->currentPage > 1 ? $this->currentPage - 1 : $this->currentPage;
    }

    public function getCurrentPage()
    {
        return $this->currentPage <= $this->getTotalPages() ? $this->currentPage : 1;
    }

    public function getNextPage(): int
    {
        return $this->currentPage < $this->getTotalPages() ? $this->currentPage + 1 : $this->currentPage;
    }

    public function getFirstLink(): string
    {
        if ($this->getCurrentPage() === 1) {
            return '
			<li class="page-item disabled"><button class="page-link h-100"><i class="bi bi-chevron-bar-left align-middle"></i></button></li>
			';
        }

        return '
		<li class="page-item">
			<button
				type="submit"
				class="page-link h-100"
				name="' . $this->table->getName() . '[pager][page]' . '"
				value="1"
				form="' . $this->table->getFormId() . '"
				><i class="bi bi-chevron-bar-left"></i>
			</button>
		</li>
		';
    }

    public function getPreviousLink(): string
    {
        if ($this->getCurrentPage() === $this->getPreviousPage()) {
            return '
			<li class="page-item disabled"><button class="page-link h-100"><i class="bi bi-chevron-double-left"></i></button></li>
			';
        }

        return '
		<li class="page-item">
			<button
				type="submit"
				class="page-link h-100"
				name="' . $this->table->getName() . '[pager][page]' . '"
				value="' . $this->getPreviousPage() . '"
				form="' . $this->table->getFormId() . '"
				>
				<i class="bi bi-chevron-double-left"></i>
			</button>
		</li>
		';
    }

    public function getPageLinks()
    {
        $maxNumLinks = $this->getTotalPages() < $this->getMaxNumLinks() ? $this->getTotalPages() : $this->getMaxNumLinks();

        $start = $this->getCurrentPage() - ($maxNumLinks / 2);
        $start = $start < 1 ? 1 : $start;
        $start = ($start + $maxNumLinks) > $this->getTotalPages() ? $this->getTotalPages() - $maxNumLinks + 1 : $start;

        $end = $start + $maxNumLinks - 1;

        $pageLinks = '';

        for ($p = $start; $p <= $end; $p++) {
            $pageLinks .= $this->getPageLink($p);
        }

        return $pageLinks;
    }

    public function getPageLink($page): string
    {
        $active = ($this->getCurrentPage() === $page) ? ' active' : '';

        return '
		<li class="page-item' . $active . '">
			<button
				type="submit"
				class="page-link"
				name="' . $this->table->getName() . '[pager][page]' . '"
				value="' . $page . '"
				form="' . $this->table->getFormId() . '"
				>' . $page . '
			</button>
		</li>
		';
    }

    public function getNextPageLink(): string
    {
        if ($this->getCurrentPage() === $this->getNextPage()) {
            return '
			<li class="page-item disabled"><button class="page-link h-100"><i class="bi bi-chevron-double-right"></i></button></li>
			';
        }

        return '
			<li class="page-item">
				<button
					type="submit"
					class="page-link h-100"
					name="' . $this->table->getName() . '[pager][page]' . '"
					value="' . $this->getNextPage() . '"
					form="' . $this->table->getFormId() . '"
					><i class="bi bi-chevron-double-right"></i>
				</button>
			</li>
			';
    }

    public function getLastLink(): string
    {
        if ($this->getCurrentPage() === $this->getTotalPages()) {
            return '
			<li class="page-item disabled"><button class="page-link h-100"><i class="bi bi-chevron-bar-right"></i></button></li>
			';
        }

        return '
			<li class="page-item">
				<button
					type="submit"
					class="page-link h-100"
					name="' . $this->table->getName() . '[pager][page]' . '"
					value="' . $this->getTotalPages() . '"
					form="' . $this->table->getFormId() . '"
					><i class="bi bi-chevron-bar-right"></i>
				</button>
			</li>
			';
    }

    public function start()
    {
        $this->alignmentClass = '';
    }

    public function end()
    {
        $this->alignmentClass = 'justify-content-end';
    }

    public function center()
    {
        $this->alignmentClass = 'justify-content-center';
    }

    public function getAlignment()
    {
        return $this->alignmentClass;
    }

    public function sizes(?array $sizes)
    {
        $this->sizes = is_array($sizes) ? $sizes : $this->table->getConfig()->perpage_sizes;
    }

    public function getSizes(): array
    {
        return $this->sizes ?? $this->table->getConfig()->perpage_sizes;
    }

    public function getCurrentSize()
    {
        return $this->perPage;
    }

    public function getValue(?string $subKey = null)
    {
        $path = [
            'table',
            $this->table->getId(),
            'pager',
            $subKey,
        ];

        $dotPath = implode('.', $path);

        helper('array');

        return dot_array_search($dotPath, request()->getGet());
    }

    public function __toString()
    {
        helper('form');

        $data = [
            'sizes'        => array_combine($this->getSizes(), $this->getSizes()),
            'current_size' => $this->getCurrentSize(),
            'perpagevar'   => $this->table->getName() . '[pager][perpage]',
            'pagevar'      => $this->table->getName() . '[pager][page]',
            'formId'       => $this->table->getFormId(),
            'pager'        => $this,
            'pagination'   => $this,
            'pagecount'    => $this->getTotalPages(),
        ];

        return view($this->table->getConfig()->views['pagination'], $data);
    }

    /**
     * Constructs a new instance.
     */
    public function __construct(Table $table)
    {
        $this->table       = $table;
        $this->perPage     = (int) ($this->getValue('perpage')) > 0 ? (int) ($this->getValue('perpage')) : $this->table->getConfig()->perpage;
        $this->currentPage = (int) ($this->getValue('page')) > 0 ? (int) ($this->getValue('page')) : 1;
    }
}
