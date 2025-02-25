@extends('vendor.layouts.master')

@section('content')

    <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
        <div class="dashboard_content mt-2 mt-md-0">
            <h2 class="mb-3">Create Product Variant</h2>
            <a href="{{ route('vendor.products-variants.index', ['product' => request()->product]) }}" class="btn btn-dark mb-3">back</a>

            <div class="wsus__dashboard_profile">
                <div class="wsus__dash_pro_area">
                    <div class="row">

                        <section class="section">
                            <div class="section-body">
                                <div class="col-12">

                                    <form action="{{ route('vendor.products-variants.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card">

                                            <div class="card-body">

                                                <div class="form-group wsus__add_address_single">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control" name="name"
                                                           value="{{ old('name') }}" placeholder="Write Name">
                                                </div>

                                                <div class="form-group wsus__add_address_single">
                                                    <input type="hidden" class="form-control" name="product_id"
                                                           value="{{ request()->product }}">
                                                </div>

                                                <div class="form-group wsus__add_address_single">
                                                    <label>Status</label>
                                                    <div class="wsus__topbar_select">
                                                        <select class="select_2" name="status">
                                                            <option value="active" selected>Active</option>
                                                            <option value="inactive">Inactive</option>
                                                        </select>
                                                    </div>
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



                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
