<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SubCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubCategory\StoreSubCategoryRequest;
use App\Http\Requests\Admin\SubCategory\UpdateSubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{

    public function index(SubCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.sub-category.index');
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.sub-category.create', compact('categories'));
    }

    public function store(StoreSubCategoryRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($request->name);
        SubCategory::create($data);
        toastr()->success('Sub Category added successfully.');
        return redirect()->back();
    }

    public function show(SubCategory $sub_category)
    {
        //
    }

    public function edit(SubCategory $sub_category)
    {
        $categories = Category::all();
        return view('admin.sub-category.edit', compact('sub_category', 'categories'));
    }

    public function update(UpdateSubCategoryRequest $request, SubCategory $sub_category)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);
        $sub_category->update($data);
        toastr()->success('Sub Category updated successfully.');
        return redirect()->back();
    }

    public function destroy(SubCategory $sub_category)
    {
        if($sub_category->childCategories()->count() > 0){
            toastr()->error('Delete Child Categories First.');
            return redirect()->route('admin.categories.index');
        }
        $sub_category->delete();
        toastr()->success('Sub Category deleted successfully.');
        return redirect()->back();
    }

    public function changeStatus(Request $request, SubCategory $sub_category)
    {
        $sub_category->update([
            'status' => $request->status == "true" ? "active" : "inactive"
        ]);
        return response()->json(['success' => 'Status updated successfully.']);
    }

    public function getSubCategories(Request $request)
    {
        $subCategory = SubCategory::where('id', $request->id)
                ->where('status', 'active')->get();
        return response()->json($subCategory);
    }
}
