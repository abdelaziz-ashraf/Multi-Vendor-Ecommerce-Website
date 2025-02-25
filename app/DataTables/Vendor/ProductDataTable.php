<?php

namespace App\DataTables\Vendor;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
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
                $editButton = "<a href='".route('vendor.products.edit', $query->id)."' class='btn btn-primary mr-2'> Edit </a>";
                $deleteButton = "<form method='POST' action='".route('vendor.products.destroy', $query->id)."'> " . csrf_field() . method_field("DELETE") . " <button type='submit' class='btn btn-danger'> Delete </button> </form>";
                $more = '<div class="btn-group dropstart">
                              <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                              aria-expanded="false">
                                More
                              </button>
                              <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="'. route('vendor.image-gallery.index', ['product' => $query->id]) .'">IMage Gallery</a></li>
                                <li><a class="dropdown-item" href="'. route('vendor.products-variants.index', ['product' => $query->id]) . '">Variants</a></li>
                              </ul>
                        </div>';
                $buttons = "<div class='d-flex'> ". $editButton . $deleteButton. $more." </div>";
                return $buttons;
            })
            ->addColumn('status', function ($query) {
                $checked = $query->status == "active" ? "checked" : "";

                return '<label class="form-check form-switch">
                            <input type="checkbox" class="form-check-input status-switch" data-id="' . $query->id . '" ' . $checked . '>
                            <span class="form-check-label"></span>
                        </label>';
            })
            ->rawColumns(['action', 'status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->where('vendor_id', auth()->id())->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('product-table')
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
            Column::make('name')->addClass('text-center'),
            Column::make('quantity')->addClass('text-center'),
            Column::make('price')->addClass('text-center'),
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
        return 'Product_' . date('YmdHis');
    }
}
