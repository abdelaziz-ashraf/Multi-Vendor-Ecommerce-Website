@extends('admin.layout.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Slider</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Mange Website</a></div>
                <div class="breadcrumb-item">Edit Slider</div>
            </div>
        </div>

        <div class="section-body">
            <div class="col-12">

                <form action="{{ route('admin.slider.update', $slider) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card">

                        <div class="card-body">

                            <div class="form-group">
                                <label>Banner</label>
                                <div class="mb-2">
                                    <img width="150px" class="" src="{{ asset($slider->banner) }}" alt="Slider Banner">
                                </div>
                                <input type="file" class="form-control" name="banner">
                            </div>

                            <div class="form-group">
                                <label>Type</label>
                                <input type="text" class="form-control" name="type" value="{{ $slider->type }}">
                            </div>

                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" value="{{ $slider->title }}">
                            </div>

                            <div class="form-group">
                                <label>Starting Price</label>
                                <input type="text" class="form-control" name="starting_price" value="{{ $slider->starting_price }}">
                            </div>

                            <div class="form-group">
                                <label>Button URL</label>
                                <input type="text" class="form-control" name="button_url" value="{{ $slider->button_url }}">
                            </div>

                            <div class="form-group">
                                <label>Serial</label>
                                <input type="text" class="form-control" name="serial" value="{{ $slider->serial }}">
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select class="custom-select" name="status">
                                    <option @selected($slider->status == 'active') value="active">Active</option>
                                    <option @selected($slider->status == 'inactive') value="inactive">Inactive</option>
                                </select>
                            </div>

                        </div>

                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>

@endsection
