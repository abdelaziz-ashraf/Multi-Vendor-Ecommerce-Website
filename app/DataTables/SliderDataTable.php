<?php

namespace App\DataTables;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SliderDataTable extends DataTable
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
                $editButton = "<a href='".route('admin.slider.edit', $query->id)."' class='btn btn-primary mr-2'> Edit </a>";
                $deleteButton = "<form method='POST' action='".route('admin.slider.destroy', $query->id)."'> " . csrf_field() . method_field("DELETE") . " <button type='submit' class='btn btn-danger'> Delete </button> </form>";
                $buttons = "<div class='d-flex'> ". $editButton . $deleteButton." </div>";
                return $buttons;
            })
            ->addColumn('banner', function ($banner) {
                return "<img width='80px' src='".asset($banner->banner)."' alt='".$banner->title."'>";
            })
            ->addColumn('status', function ($query) {
                $color = ($query->status == "active" ? "bg-success" : "bg-danger");
                return '<td> <span class="badge ' . $color . '">' . $query->status . '</span> </td>';
            })
            ->rawColumns(['action', 'banner', 'status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Slider $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('slider-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
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
            Column::make('banner'),
            Column::make('title')->addClass('text-center'),
            Column::make('type')->addClass('text-center'),
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
        return 'Slider_' . date('YmdHis');
    }
}
