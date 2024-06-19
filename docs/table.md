Table
# Getting started

## Overview

With the table generator you can add a data table within the codeigniter4 framework.
This tutorial will walk you through the basics of creating tables.

## Define table with model and query

The basis of each table is a model. The table intern generated query builder can be supplemented with query.

The model is added to the table within the ```$table->model()``` method.

```php
use Rakoitde\Table\Table;
use Rakoitde\Table\Columns\ColumnText;

    public function table(): Table
    {
        return Table::make()
            ->model(CompanyModel::class)
            .....
            ;
    }
```

### Query

The result can be extended with a join, for example, so that fields from other tables can be displayed, sorted and filtered.

A query is added to the table within the ```$table->query()``` method. The argument is a closure function ```fn (Model $query) => $query->join('company_type', 'company_type.id=company.type_id')```

```php
use Rakoitde\Table\Table;
use Rakoitde\Table\Columns\ColumnText;

    public function table(): Table
    {
        return Table::make()
            ->model(CompanyModel::class)
            ->query(fn (Model $query) => $query
                ->select('company.*, company_type.type')
                ->join('company_type', 'company_type.id=company.type_id')
            )
            ->columns(
                Columns\ColumnText::make('type')
                    ->field('company_type.type')
                    ->searchable(),
            )
            ->filters([
                Filters\FilterSelect::make('type_id')
                    ->label('Typ')
                    ->options($companyTypeOptions, '{type}')
                    ->multiple(),
            ])
            .....
            ;
    }
```

## Format table

```php
    public function table(): Table
    {
        return Table::make()
            ->heading("Companies")
            ->subheading("All companies")
            ->caption("Customer Table Caption")
            ->small()
            ->striped()
            ->hover()
```

### Heading and subheading

Describes the table with heading and subeading in navigation bar

```php
    public function table(): Table
    {
        return Table::make()
            ->heading("Companies")
            ->subheading("All companies")
```

### Caption

```php
    public function table(): Table
    {
        return Table::make()
            ->caption("Customer Table Caption")
```

Creates a caption element

```html
<caption>Customer Table Caption</caption>
```

### Size, Stiped, Hover

The methods ```small()```, ```striped()``` and ```hover()``` adds ```table-sm```, ```table-stiped``` and ```table-hover``` to table class.

## Add columns to table

The basis of every table are rows and columns.
This library contains many pre-defined column types. It is also possible to create your own custom column types.

Columns are added to the table within the ```$table->columns()``` method:

```php
use Rakoitde\Table\Table;
use Rakoitde\Table\Columns\ColumnText;
use Rakoitde\Table\Columns\ColumnIcon;

    public function table(): Table
    {
        return Table::make()
            ->model(CompanyModel::class)
            ->columns(
                ColumnText::make('id'),
                ColumnText::make('name'),
                ColumnText::make('url'),
                ColumnIcon::make('is_internal')
                    ->boolean(),
            );
    }
```

### ColumnText

```php
use Rakoitde\Table\Table;
use Rakoitde\Table\Columns\ColumnText;

    public function table(): Table
    {
        return Table::make()
            ->model(CompanyModel::class)
            ->columns(
                ColumnText::make('name')
                    ->label('PostalCode')
                    ->numeric()
                    ->sortable(),
            );
    }
```

### ColumnIcon

```php
use Rakoitde\Table\Table;
use Rakoitde\Table\Columns\ColumnIcon;

    public function table(): Table
    {
        return Table::make()
            ->model(CompanyModel::class)
            ->columns(
                ColumnIcon::make('is_internal')
                    ->label('Intern')
                    ->boolean()
                    ->trueIcon('toggle-on')
                    ->falseIcon('toggle-off')
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->center(),
            );
    }
```

## Making columns searchable

```php
use Rakoitde\Table\Table;
use Rakoitde\Table\Columns\ColumnText;

    public function table(): Table
    {
        return Table::make()
            ->model(CompanyModel::class)
            ->columns(
                ColumnText::make('name')
                    ->searchable(),
            );
    }
```

## Making columns sortable

```php
use Rakoitde\Table\Table;
use Rakoitde\Table\Columns\ColumnText;

    public function table(): Table
    {
        return Table::make()
            ->model(CompanyModel::class)
            ->columns(
                ColumnText::make('name')
                    ->sortable(),
            );
    }
```

## Making columns toggleable

```php
use Rakoitde\Table\Table;
use Rakoitde\Table\Columns\ColumnText;

    public function table(): Table
    {
        return Table::make()
            ->model(CompanyModel::class)
            ->columns(
                ColumnText::make('name')
                    ->toggleable(isHiddenByDefault: true),
            );
    }
```

## Defining table actions

```php
<?php

namespace App\Controllers;

use Rakoitde\Table\Table;
use Rakoitde\Table\Actions\ActionShow;
use Rakoitde\Table\Actions\ActionEdit;
use Rakoitde\Table\Actions\ActionDelete;

    public function table(): Table
    {
        return Table::make()
            ->actions([
                ActionShow::make('show'),
                ActionEdit::make('edit'),
                ActionDelete::make('delete')
                    ->requiresConfirmation()
                    ->modalHeading('Delete posts')
                    ->modalSubheading('Are you sure you\'d <strong>like to delete</strong> these posts?')
                    ->modalCloseButton('Schließen')
                    ->modalSubmitButton('Löschen'),
                ],
                size: Size::Small,
            );
    }
}
```

### ActionShow

```php
<?php

namespace App\Controllers;

use Rakoitde\Table\Table;
use Rakoitde\Table\Actions\ActionShow;

    public function table(): Table
    {
        return Table::make()
            ->actions([
                ActionShow::make('show')
                    ->text('Show'),
                ]);
    }
}
```

Creates a show button with ```href="/currentUrl/{id}"``` attribute.

```html
<a type="button" href="/company/31" id="show" name="show" class="btn btn btn-outline-secondary btn-sm text-nowrap border-0">
    <i class="bi bi-binoculars"></i>
</a>
```

### ActionEdit

```php
<?php

namespace App\Controllers;

use Rakoitde\Table\Table;
use Rakoitde\Table\Actions\ActionEdit;

    public function table(): Table
    {
        return Table::make()
            ->actions([
                ActionEdit::make('edit')
                    ->text('Edit'),
                ]);
    }
}
```

### ActionDelete

```php
<?php

namespace App\Controllers;

use Rakoitde\Table\Table;
use Rakoitde\Table\Actions\ActionDelete;

    public function table(): Table
    {
        return Table::make()
            ->actions([
                ActionDelete::make('delete')
                    ->text('Delete')
                    ->requiresConfirmation()
                    ->modalHeading('Delete posts')
                    ->modalSubheading('Are you sure you\'d <strong>like to delete</strong> these posts?')
                    ->modalCloseButton('Schließen')
                    ->modalSubmitButton('Löschen'),
            ]),
    }
}
```

## Defining table bulk actions

```php
<?php

namespace App\Controllers;

use Rakoitde\Table\Table;
use Rakoitde\Table\BulkActions;

    public function table(): Table
    {
        return Table::make()
            ->bulkActions([
                BulkActions\BulkActionDelete::make('bulkdelete')
                    ->requiresConfirmation()
                    ->modalHeading('Delete posts')
                    ->modalSubheading('Are you sure you\'d <strong>like to delete</strong> these posts?')
                    ->modalCloseButton('Schließen')
                    ->modalSubmitButton('Löschen'),
                ],
                size: Size::Small,
            );
    }
}
```

# Examples

## Controller

```php
<?php

namespace App\Controllers;

use App\Entities\CompanyEntity;
use App\Models\CompanyModel;
use Rakoitde\Table\Table;
use Rakoitde\Table\Actions;
use Rakoitde\Table\BulkActions;
use Rakoitde\Table\Columns;
use Rakoitde\Table\Actions\Enums\Size;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'table' => $this->table(),
        ];

        return view('bootstrap', $data);
    }

    public function table(): Table
    {
        return Table::make()
            ->heading("Gesellschaften2")
            ->subheading("Alle Gesellschaften der Knappschaft Kliniken")
            ->caption("Customer Table Caption")
            ->model(CompanyModel::class)
            ->small()
            ->paginated() #->Hover()->Small()
            ->columns(
                Columns\Column::make('id')
                    ->label('#')
                    ->right(),
                Columns\ColumnText::make('parent'),
                Columns\ColumnText::make('name')
                    ->label('Name')
                    ->sortable(),
                Columns\ColumnText::make('type')
                    ->label('Typ'),
                Columns\ColumnText::make('url')
                    ->label('Url')
                    ->sortable(),
                Columns\ColumnText::make('postal_code')
                    ->label('PostalCode')
                    ->numeric()
                    ->sortable(),
                Columns\ColumnIcon::make('is_internal')
                    ->label('Intern')
                    ->boolean()
                    ->trueIcon('toggle-on')
                    ->falseIcon('toggle-off')
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->center(),
            )
            ->actions([
                Actions\ActionShow::make('show'),
                Actions\ActionEdit::make('edit'),
                Actions\ActionDelete::make('delete')
                    ->requiresConfirmation()
                    ->modalHeading('Delete posts')
                    ->modalSubheading('Are you sure you\'d <strong>like to delete</strong> these posts?')
                    ->modalCloseButton('Schließen')
                    ->modalSubmitButton('Löschen'),
                ],
                size: Size::Small,
            )
            ->bulkActions([
                BulkActions\BulkActionDelete::make('bulkdelete')
                    ->requiresConfirmation()
                    ->modalHeading('Delete posts')
                    ->modalSubheading('Are you sure you\'d <strong>like to delete</strong> these posts?')
                    ->modalCloseButton('Schließen')
                    ->modalSubmitButton('Löschen'),
                ],
                size: Size::Small,
            );
    }
}
```

