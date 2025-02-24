@extends('vendor.layouts.master')

@section('content')

    <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">

        <a href="{{ route('vendor.products.index') }}" class="btn btn-dark mb-3">back</a>

        <h2 class="mb-2">Product: [ {{ $product->name }} ] Image Gallery</h2>

        <div class="dashboard_content mt-2 mt-md-0">
            <div class="wsus__dashboard_profile">
                <div class="wsus__dash_pro_area">
                    <h3>Upload Image</h3>
                    <div class="row">
                        <form action="{{ route('vendor.image-gallery.store') }}" method="post" enctype="multipart/form-data">

                            @csrf
                            <div class="card">

                                <div class="card-body">
                                    <div class="form-group wsus__add_address_single" >
                                        <label>Image <code>(can upload multiple images)</code></label>
                                        <input type="file" class="form-control" name="image[]" multiple>
                                        <input type="hidden" name="product" value="{{ $product->id }}">
                                    </div>
                                </div>

                                <div class="card-footer text-right">
                                    <button class="btn btn-primary mr-1" type="submit">Create</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard_content mt-2 mt-md-3">
            <div class="wsus__dashboard_profile">
                <div class="wsus__dash_pro_area">
                    <h3>Images</h3>
                    <div class="row">
                        {{ $dataTable->table() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

@endpush
