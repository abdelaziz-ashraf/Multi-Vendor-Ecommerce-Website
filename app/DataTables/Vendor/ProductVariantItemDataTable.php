<?php

namespace App\DataTables\Vendor;

use App\Models\ProductVariantItem;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ProductVariantItemDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('status', function ($query) {
                $checked = $query->status == "active" ? "checked" : "";
                return '<label class="custom-switch">
                            <input type="checkbox" class="custom-switch-input status-switch" data-id="' . $query->id . '" ' . $checked . '>
                            <span class="custom-switch-indicator"></span>
                        </label>';
            })
            ->addColumn('action', function ($query) {
                $editButton = "<a href='".route('vendor.product-variant-item.edit', [
                    'product' => request()->product, 'variant' => request()->variant, 'item' => $query
                    ])."' class='btn btn-primary mr-2'> Edit </a>";
                $deleteButton = "<form method='POST' action='".route('vendor.product-variant-item.destroy', [
                    'product' => request()->product, 'variant' => request()->variant, 'item' => $query
                    ])."'> " . csrf_field() . method_field("DELETE") . " <button type='submit' class='btn btn-danger'> Delete </button> </form>";
                $buttons = "<div class='d-flex'> " . $editButton . $deleteButton ." </div>";
                return $buttons;
            })
            ->addColumn('is_default', function ($query) {
                $color = ($query->is_default == "1" ? "bg-success" : "bg-danger");
                $is_default = ($query->is_default == "1" ? "Yes" : "No");
                return '<td> <span class="badge ' . $color . '">' . $is_default . '</span> </td>';
            })
            ->rawColumns(['action', 'status', 'is_default'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ProductVariantItem $model): QueryBuilder
    {
        return $model->where('variant_id', request()->variant->id)->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('productvariantitem-table')
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
            Column::make('name')->addClass('text-center'),
            Column::make('price')->addClass('text-center'),
            Column::make('is_default')->addClass('text-center'),
            Column::make('status'),
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
        return 'ProductVariantItem_' . date('YmdHis');
    }
}
