<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BrandDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Brand\StoreBrandRequest;
use App\Http\Requests\Admin\Brand\UpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{

    public function index(BrandDatatable $datatable){
        return $datatable->render('admin.brand.index');
    }

    public function show(Brand $brand){}

    public function create(){
        return view('admin.brand.create');
    }

    public function store(StoreBrandRequest $request){
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);
        $data['logo'] = $this->uploadImage($request, 'logo', 'uploads/frontend/brands');
        Brand::create($data);
        toastr()->success('Brand Created Successfully');
        return redirect()->back();
    }

    public function edit(Brand $brand){
        return view('admin.brand.edit', compact('brand'));
    }

    public function update(UpdateBrandRequest $request, Brand $brand){
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);
        $data['logo'] = $this->uploadImage($request, 'logo', 'uploads/frontend/brands', $brand->logo);
        $brand->update($data);
        toastr()->success('Brand Updated Successfully');
        return redirect()->route('admin.brands.index');
    }

    public function destroy(Brand $brand){
        $brand->delete();
        $this->deleteImageIfExists($brand->logo);
        toastr()->success('Brand Deleted Successfully');
        return redirect()->route('admin.brands.index');
    }

    public function changeStatus(Request $request, Brand $brand) {
        $brand->update([
            'status' => $request->status == "true" ? "active" : "inactive"
        ]);
        return response()->json(['success' => 'Status updated successfully.']);
    }
}
