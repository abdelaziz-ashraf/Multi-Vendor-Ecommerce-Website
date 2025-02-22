<?php

namespace App\DataTables;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BrandDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                $editButton = "<a href='".route('admin.brands.edit', $query->id)."' class='btn btn-primary mr-2'> Edit </a>";
                $deleteButton = "<form method='POST' action='".route('admin.brands.destroy', $query->id)."'> " . csrf_field() . method_field("DELETE") . " <button type='submit' class='btn btn-danger'> Delete </button> </form>";
                $buttons = "<div class='d-flex'> ". $editButton . $deleteButton." </div>";
                return $buttons;
            })
            ->addColumn('status', function ($query) {
                $checked = $query->status == "active" ? "checked" : "";
                return '<label class="custom-switch">
                            <input type="checkbox" class="custom-switch-input status-switch" data-id="' . $query->id . '" ' . $checked . '>
                            <span class="custom-switch-indicator"></span>
                        </label>';
            })
            ->addColumn('is_featured', function ($query) {
                $color = ($query->is_featured == "1" ? "bg-success" : "bg-danger");
                $featured = ($query->is_featured == "1" ? "YES" : "NO");
                return '<td> <span class="badge ' . $color . '">' . $featured . '</span> </td>';
            })
            ->addColumn('logo', function ($query) {
                return "<img width='80px' src='".asset($query->logo)."' alt='".$query->name."'>";
            })
            ->rawColumns(['action', 'status', 'is_featured', 'logo'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Brand $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('brand-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(0)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {


        return [
            Column::make('id')->addClass('text-center'),
            Column::make('logo')->addClass('text-center'),
            Column::make('name')->addClass('text-center'),
            Column::make('is_featured')->addClass('text-center'),
            Column::make('status')->addClass('text-center'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),

        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Brand_' . date('YmdHis');
    }
}
