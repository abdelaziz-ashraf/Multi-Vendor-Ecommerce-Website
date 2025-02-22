<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ChildCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ChildCategory\StoreChildCategoryRequest;
use App\Http\Requests\Admin\ChildCategory\UpdateChildCategoryRequest;
use App\Models\Category;
use App\Models\ChildCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChildCategoryController extends Controller
{

    public function index(ChildCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.child-category.index');
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.child-category.create', compact('categories'));
    }

    public function store(StoreChildCategoryRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);
        ChildCategory::create($data);
        toastr()->success('Child Category Added Successfully');
        return redirect()->back();
    }

    public function edit(ChildCategory $child_category)
    {
        $categories = Category::all();
        $sub_categories = $child_category->category->subCategories;
        return view('admin.child-category.edit', compact('child_category', 'categories', 'sub_categories'));
    }

    public function update(UpdateChildCategoryRequest $request, ChildCategory $child_category)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);
        $child_category->update($data);
        toastr()->success('Child Category Updated Successfully');
        return redirect()->back();
    }

    public function destroy(ChildCategory $child_category)
    {
        $child_category->delete();
        toastr()->success('Child Category Deleted Successfully');
        return redirect()->back();
    }

    public function changeStatus(Request $request, ChildCategory $child_category)
    {
        $child_category->update([
            'status' => $request->status == "true" ? "active" : "inactive"
        ]);
        return response()->json(['success' => 'Status updated successfully.']);
    }
}
