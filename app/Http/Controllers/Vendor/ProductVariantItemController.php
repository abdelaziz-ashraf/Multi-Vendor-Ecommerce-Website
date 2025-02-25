<?php

namespace App\Http\Controllers\Vendor;

use App\DataTables\Vendor\ProductVariantItemDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Vendor\Product\StoreVariantItem;
use App\Http\Requests\Vendor\Produt\UpdateVariantItemRequest;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantItem;
use Illuminate\Http\Request;

class ProductVariantItemController extends Controller
{
    public function index(ProductVariantItemDataTable $dataTable, Product $product, ProductVariant $variant)
    {
        if($product->vendor_id != auth()->id()){
            abort(404);
        }
        return $dataTable->render('vendor.product.variant-items.index', [
            'product' => $product, 'variant' => $variant
        ]);
    }

    public function create(Product $product, ProductVariant $variant) {
        if($product->vendor_id != auth()->id()){
            abort(404);
        }
        return view('vendor.product.variant-items.create', [
            'variant' => $variant, 'product' => $product
        ]);
    }

    public function store(StoreVariantItem $request, Product $product, ProductVariant $variant)
    {
        if($product->vendor_id != auth()->id()){
            abort(404);
        }
        $data = $request->validated();
        $data['variant_id'] = $variant->id;
        ProductVariantItem::create($data);
        toastr()->success('Product Variant Item Added Successfully');
        return redirect()->route('vendor.product-variant-item.index', [
            'product' => $product, 'variant' => $variant
        ]);
    }

    public function edit(Product $product, ProductVariant $variant, ProductVariantItem $item)
    {
        if($product->vendor_id != auth()->id()){
            abort(404);
        }
        return view('vendor.product.variant-items.edit', [
            'variant' => $variant, 'product' => $product, 'item' => $item
        ]);
    }

    public function update(UpdateVariantItemRequest $request, Product $product, ProductVariant $variant, ProductVariantItem $item)
    {
        if($product->vendor_id != auth()->id()){
            abort(404);
        }
        $data = $request->validated();
        $item->update($data);
        toastr()->success('Product Variant Item Updated Successfully');
        return redirect()->route('vendor.product-variant-item.index', [
            'product' => $product, 'variant' => $variant
        ]);
    }

    public function destroy(Product $product, ProductVariant $variant, ProductVariantItem $item)
    {
        if($product->vendor_id != auth()->id()){
            abort(404);
        }
        $item->delete();
        toastr()->success('Product Variant Item Deleted Successfully');
        return redirect()->route('vendor.product-variant-item.index', [
            'product' => $product, 'variant' => $variant
        ]);
    }

    public function changeStatus(ProductVariantItem $item)
    {
        $item->update([
            'status' => ($item->status == 'active') ? 'inactive' : 'active'
        ]);
        return response()->json(['success' => 'Item status updated successfully.']);

    }
}
