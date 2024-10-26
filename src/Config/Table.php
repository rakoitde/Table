<?php

declare(strict_types=1);

namespace Rakoitde\Table\Config;

/**
 * This class describes the default ci4table configuration.
 */
class Table
{
    /**
     * sets table size to small
     */
    public bool $small = false;

    /**
     * table striped
     */
    public bool $striped = false;

    /**
     * table hoover
     */
    public bool $hover = false;

    /**
     * table is sortable
     */
    public bool $sortable = false;

    /**
     * table is filterable
     */
    public bool $filterable = false;

    /**
     * paginate table
     */
    public bool $paginate = false;

    /**
     * prefix for all sort vars
     */
    public string $sortvar = '_sort';

    /**
     * sort icons
     */
    public array $sorted_icon = [
        ''     => '',
        'asc'  => '<i class="bi bi-sort-down-alt ps-1"></i>',
        'desc' => '<i class="bi bi-sort-up ps-1"></i>',
    ];

    /**
     * prefix for the search var
     */
    public string $searchvar = '_search';

    /**
     * prefix for all filter vars
     */
    public string $filtervar = '_filter';

    /**
     * prefix for the perpage var
     */
    public string $perpagevar = '_perpage';

    /**
     * prefix for the perpage var
     */
    public string $pagevar = '_page';

    /**
     * options for the per page size select
     */
    public array $perpage_sizes = [5, 10, 15, 20, 25, 50, 100, 200, 500];

    /**
     * default per page size
     */
    public int $perpage = 15;

    /**
     * default formats for field types
     */
    public array $format = [
        'date'     => 'd.m.Y',       // 01.01.2021
        'datetime' => 'd.m.Y H:i:s', // 01.01.2021 12:30:00
        'time'     => 'H:i:s',       // 01.01.2021 12:30:00
        'decimal'  => '2',           // precision 123,45
        'float'    => '2',           // precision 123,45
        'currency' => 'EUR',         // 1.234,56 €
    ];

    /**
     * default options for field types
     */
    public array $options = [
        'checkbox' => ['1' => 'Ja', '0' => 'Nein'],
    ];

    public array $views = [
        'modal_confirm' => 'Rakoitde\Table\Views\Table\modal_confirm',
        'pagination'    => 'Rakoitde\Table\Views\Table\pagination',
        'table'         => 'Rakoitde\Table\Views\table',
        'toolbar'       => 'Rakoitde\Table\Views\Table\toolbar',
    ];
    public array $action_views = [
        'button' => 'Rakoitde\Table\Views\Actions\button',
        'icon'   => 'Rakoitde\Table\Views\Actions\icon',
    ];

    public string $iconPrefix = 'bi bi-';
    public array $column      = [
        'trueColor'  => 'success',
        'falseColor' => 'danger',
        'trueIcon'   => 'check-lg',
        'falseIcon'  => 'x-lg',
    ];
}
