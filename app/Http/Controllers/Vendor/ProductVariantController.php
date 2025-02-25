<?php

namespace App\Http\Controllers\Vendor;

use App\DataTables\Vendor\ProductVariantDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Vendor\Product\StoreVariant;
use App\Http\Requests\Vendor\Product\UpdateVariant;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    public function index(Request $request, ProductVariantDataTable $dataTable)
    {
        $product = Product::where('id', $request->product)->first();
        return $dataTable->render('vendor.product.variant.index', compact('product'));
    }

    public function create()
    {
        return view('vendor.product.variant.create');
    }

    public function store(StoreVariant $request)
    {
        ProductVariant::create($request->validated());
        toastr()->success('Product variant added successfully.');
        return redirect()->route('vendor.products-variants.index', ['product' => $request->validated()['product_id']]);
    }

    public function edit(ProductVariant $products_variant) {
        return view('vendor.product.variant.edit', compact('products_variant'));
    }

    public function update(UpdateVariant $request, ProductVariant $products_variant) {
        $products_variant->update($request->validated());
        toastr()->success('Product variant updated successfully.');
        return redirect()->route('vendor.products-variants.index', ['product' => $products_variant->product_id]);
    }

    public function destroy(ProductVariant $products_variant) {
        $products_variant->delete();
        toastr()->success('Product variant deleted successfully.');
        return redirect()->route('vendor.products-variants.index', ['product' => $products_variant->product]);
    }

    public function changeStatus(ProductVariant $products_variant) {
        $products_variant->update([
            'status' => ($products_variant->status == 'active') ? 'inactive' : 'active'
        ]);
        return response()->json(['success' => 'Product variant status updated successfully.']);
    }
}
