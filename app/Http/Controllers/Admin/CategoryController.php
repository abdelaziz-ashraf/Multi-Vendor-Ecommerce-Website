<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreCategoryRequest;
use App\Http\Requests\Admin\Category\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function index(CategoryDataTable $categoryDataTable)
    {
        return $categoryDataTable->render('admin.category.index');
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);
        Category::create($data);
        toastr()->success('Category added successfully.');
        return redirect()->route('admin.categories.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);
        $category->update($data);
        toastr()->success('Category updated successfully.');
        return redirect()->back();
    }

    public function destroy(Category $category)
    {
        $category->delete();
        toastr()->success('Category deleted successfully.');
        return redirect()->route('admin.categories.index');
    }

    public function changeStatus(Request $request, Category $category)
    {
        $category->update([
            'status' => $request->status == "true" ? "active" : "inactive"
        ]);
        return response()->json(['success' => 'Status updated successfully.']);
    }
}
