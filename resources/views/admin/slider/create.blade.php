@extends('admin.layout.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Create Slider</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Mange Website</a></div>
                <div class="breadcrumb-item">Create Slider</div>
            </div>
        </div>

        <div class="section-body">
            <div class="col-12">

                <form action="{{ route('admin.slider.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">

                        <div class="card-body">
                            <div class="form-group">
                                <label>Banner</label>
                                <input type="file" class="form-control" name="banner">
                            </div>

                            <div class="form-group">
                                <label>Type</label>
                                <input type="text" class="form-control" name="type" value="{{ old('type') }}">
                            </div>

                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                            </div>

                            <div class="form-group">
                                <label>Starting Price</label>
                                <input type="text" class="form-control" name="starting_price" value="{{ old('starting_price') }}">
                            </div>

                            <div class="form-group">
                                <label>Button URL</label>
                                <input type="text" class="form-control" name="button_url" value="{{ old('button_url') }}">
                            </div>

                            <div class="form-group">
                                <label>Serial</label>
                                <input type="text" class="form-control" name="serial" value="{{ old('serial') }}">
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select class="custom-select" name="status">
                                    <option selected value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>

                        </div>

                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>
@endsection
