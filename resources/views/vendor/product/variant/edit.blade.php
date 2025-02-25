@extends('vendor.layouts.master')

@section('content')

    <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
        <div class="dashboard_content mt-2 mt-md-0">
            <h2 class="mb-3">Update Product Variant</h2>
            <a href="{{ route('vendor.products-variants.index', ['product' => $products_variant->product]) }}" class="btn btn-dark mb-3">back</a>

            <div class="wsus__dashboard_profile">
                <div class="wsus__dash_pro_area">
                    <div class="row">

                        <section class="section">
                            <div class="section-body">
                                <div class="col-12">

                                    <form action="{{ route('vendor.products-variants.update', $products_variant) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="card">

                                            <div class="card-body">

                                                <div class="form-group wsus__add_address_single">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control" name="name"
                                                           value="{{ $products_variant->name }}" placeholder="Write Name">
                                                </div>

                                                <div class="form-group wsus__add_address_single">
                                                    <label>Status</label>
                                                    <div class="wsus__topbar_select">
                                                        <select class="select_2" name="status">
                                                            <option @selected($products_variant->status == 'active') value="active">Active</option>
                                                            <option @selected($products_variant->status == 'inactive') value="inactive">Inactive</option>
                                                        </select>
                                                    </div>
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



                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
