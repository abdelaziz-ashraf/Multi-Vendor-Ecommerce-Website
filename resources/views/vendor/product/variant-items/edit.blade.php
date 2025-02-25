@extends('vendor.layouts.master')

@section('content')

    <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
        <div class="dashboard_content mt-2 mt-md-0">
            <h2 class="mb-3">Add Variant Item</h2>
            <a href="{{ route('vendor.products-variants.index', ['product' => request()->product]) }}" class="btn btn-dark mb-3">back</a>

            <div class="wsus__dashboard_profile">
                <div class="wsus__dash_pro_area">
                    <div class="row">

                        <section class="section">
                            <div class="section-body">
                                <div class="col-12">

                                    <form action="{{ route('vendor.product-variant-item.update', [
                                        'product' => $product, 'variant' => $variant, 'item' => $item]) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="card">

                                            <div class="card-body">

                                                <div class="form-group wsus__add_address_single">
                                                    <label>Variant Name</label>
                                                    <input type="text" readonly class="form-control" name="variant_name"
                                                           value="{{ $variant->name }}">
                                                </div>

                                                <div class="form-group wsus__add_address_single">
                                                    <label>Variant Item Name</label>
                                                    <input type="text" class="form-control" name="name"
                                                           value="{{ $item->name }}" placeholder="Write Item Name">
                                                </div>

                                                <div class="form-group wsus__add_address_single">
                                                    <label>Price</label>
                                                    <input type="text" class="form-control" name="price"
                                                           value="{{ $item->price }}" placeholder="Write Price (0 means free)">
                                                </div>

                                                <div class="form-group wsus__add_address_single">
                                                    <label>Is Default</label>
                                                    <div class="wsus__topbar_select">
                                                        <select class="select_2" name="is_default">
                                                            <option @selected($item->is_default == 1) value="1">Yes</option>
                                                            <option @selected($item->is_default == 0) value="0">NO</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group wsus__add_address_single">
                                                    <label>Status</label>
                                                    <div class="wsus__topbar_select">
                                                        <select class="select_2" name="status">
                                                            <option @selected($item->status == 'active') value="active" selected>Active</option>
                                                            <option @selected($item->status == 'inactive') value="inactive">Inactive</option>
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
