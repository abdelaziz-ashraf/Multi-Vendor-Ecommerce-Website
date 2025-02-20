<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SliderDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Slider\StoreSliderRequest;
use App\Http\Requests\Admin\Slider\UpdateSiderRequest;
use App\Models\Slider;

class SliderController extends Controller
{
    public function index(SLiderDataTable $dataTable)
    {
        return $dataTable->render('admin.slider.index');
    }

    public function create() {
        return view('admin.slider.create');
    }

    public function store(StoreSliderRequest $request) {
        $data = $request->validated();
        $data['banner'] = $this->uploadImage($request, 'banner', 'uploads/frontend/slider');
        Slider::create($data);
        toastr()->success('Banner added successfully.');
        return redirect()->back();
    }

    public function edit(Slider $slider) {
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(UpdateSiderRequest $request, Slider $slider) {
        $data = $request->validated();
        $data['banner'] = $this->uploadImage($request, 'banner', 'uploads/frontend/slider', $slider->banner) ?? $slider->banner;
        $slider->update($data);
        toastr()->success('Banner updated successfully.');
        return redirect()->back();
    }

    public function destroy(Slider $slider) {
        $slider->delete();
        $this->deleteOldImageIfExists($slider->banner);
        toastr()->success('Banner deleted successfully.');
        return redirect()->back();
    }
}
