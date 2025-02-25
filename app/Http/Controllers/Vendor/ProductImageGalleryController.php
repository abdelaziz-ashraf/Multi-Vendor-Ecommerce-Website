<?php

namespace App\Http\Controllers\Vendor;

use App\DataTables\Vendor\ProductImageGalleryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Vendor\Product\StoreProductImageGalleryRequest;
use App\Models\Product;
use App\Models\ProductImageGallery;
use Illuminate\Http\Request;

class ProductImageGalleryController extends Controller
{
    public function index(Request $request, ProductImageGalleryDataTable $dataTable) {
        $product = Product::findOrFail($request->query('product'));
        return $dataTable->render('vendor.product.image-gallery.index', compact('product'));
    }

    public function store(StoreProductImageGalleryRequest $request)
    {
        $imagePaths = $this->uploadMultiImage($request,  'image', 'uploads/frontend/product/image-gallery');
        foreach ($imagePaths as $imagePath) {
            ProductImageGallery::create([
                'product_id' => $request->product,
                'image' => $imagePath,
            ]);
        }
        toastr()->success('Image added successfully.');
        return redirect()->back();
    }

    public function destroy(ProductImageGallery $image_gallery)
    {

        $image_gallery->delete();
        $this->deleteImageIfExists($image_gallery->image);
        toastr()->success('Image deleted successfully.');
        return redirect()->back();
    }
}
