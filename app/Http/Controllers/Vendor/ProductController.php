<?php

namespace App\Http\Controllers\Vendor;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Vendor\Product\StoreProductRequest;
use App\Http\Requests\Vendor\Product\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    public function index(ProductDataTable $dataTable) {
        return $dataTable->render('vendor.product.index');
    }

    public function create() {
        $categories = Category::where('status', 'active')->get();
        $brands = Brand::where('status', 'active')->get();
        return view('vendor.product.create', compact('categories', 'brands'));
    }

    public function store(StoreProductRequest $request) {
        $data = $request->validated();
        $data['thump_image'] = $this->uploadImage($request, 'thump_image', 'uploads/frontend/products_thumps');
        $data['vendor_id'] = auth()->id();
        $data['slug'] = Str::slug($data['name']);
        Product::create($data);
        toastr()->success('Product added successfully.');
        return redirect()->back();
    }

    public function edit(Product $product) {
        if($product->vendor_id != auth()->id()){
            return throw ValidationException::withMessages(['authorization' => 'You can not Show this product.']);
        }
        $categories = Category::where('status', 'active')->get();
        $brands = Brand::where('status', 'active')->get();
        return view('vendor.product.edit', compact('product', 'categories', 'brands'));
    }

    public function update(UpdateProductRequest $request, Product $product) {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);
        $data['thump_image'] = $this->uploadImage($request, 'thumb_image',
            'uploads/frontend/products_thumps', $product->thump_image) ?? $product->thump_image;
        $product->update($data);
        toastr()->success('Product updated successfully.');
        return redirect()->back();
    }

    public function destroy(Product $product) {
        if($product->vendor_id != auth()->id()){
            return throw ValidationException::withMessages(['authorization' => 'You can not delete this product.']);
        }

        $product->delete();
        $this->deleteImageIfExists($product->thump_image);
        toastr()->success('Product deleted successfully.');
        return redirect()->back();
    }

    public function changeStatus(Request $request, Product $product)
    {
        if($product->vendor_id != auth()->id()){
            return throw ValidationException::withMessages(['authorization' => 'You can not update this product.']);
        }
        $product->update([
            'status' => ($product->status == 'active') ? 'archive' : 'active'
        ]);
        return response()->json(['success' => 'Product status updated successfully.']);
    }
}
