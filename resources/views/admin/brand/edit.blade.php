@extends('admin.layout.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Update Brand</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Mange Products</a></div>
                <div class="breadcrumb-item">Update Brand</div>
            </div>
        </div>

        <div class="section-body">
            <div class="col-12">

                <form action="{{ route('admin.brands.update', $brand) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card">

                        <div class="card-body">
                            <div class="form-group">
                                <label>Logo</label>
                                <div class="mb-2">
                                    <img width="150px" class="" src="{{ asset($brand->logo) }}" alt="Logo">
                                </div>
                                <input type="file" class="form-control" name="logo">
                            </div>

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $brand->name }}">
                            </div>

                            <div class="form-group">
                                <label>Is Featured </label>
                                <select class="custom-select" name="is_featured">
                                    <option @selected($brand->is_featured == 1) value="1">Yes</option>
                                    <option @selected($brand->is_featured == 0) value="0">No</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label> Status </label>
                                <select class="custom-select" name="status">
                                    <option @selected($brand->status == 'active') value="active">Active</option>
                                    <option @selected($brand->status == 'inactive') value="inactive">Inactive</option>
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
