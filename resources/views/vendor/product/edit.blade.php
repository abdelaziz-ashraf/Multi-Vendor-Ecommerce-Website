@extends('vendor.layouts.master')

@section('content')

    <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
        <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user"></i>Update Product</h3>
            <div class="wsus__dashboard_profile">
                <div class="wsus__dash_pro_area">
                    <div class="row">

                        <section class="section">
                            <div class="section-body">
                                <div class="col-12">

                                    <form action="{{ route('vendor.products.update', $product) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="card">

                                            <div class="card-body">
                                                <div class="form-group wsus__add_address_single" >
                                                    <label>Thump Image</label>
                                                    <div class="mb-2">
                                                        <img width="150px" class="" src="{{ asset($product->thump_image) }}" alt="thump image">
                                                    </div>
                                                    <input type="file" class="form-control" name="thump_image">
                                                </div>

                                                <div class="form-group wsus__add_address_single">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control" name="name"
                                                           value="{{ $product->name }}" placeholder="Write Name">
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group wsus__add_address_single">
                                                            <label> Category</label>
                                                            <div class="wsus__topbar_select">
                                                                <select class="select_2 main_category" name="category_id">
                                                                    <option value="">Select</option>
                                                                    @foreach($categories as $category)
                                                                        <option @selected($product->category_id == $category->id) value="{{ $category->id }}"> {{ $category->name }} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group wsus__add_address_single">
                                                            <label>Sub Category</label>
                                                            <div class="wsus__topbar_select">
                                                                <select class="select_2 subcategory" name="subcategory_id">
                                                                    <option value="{{ $product->subcategory_id }}">{{ $product->subCategory->name }}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group wsus__add_address_single">
                                                            <label>Child Category</label>
                                                            <div class="wsus__topbar_select">
                                                                <select class="select_2 childcategory" name="childcategory_id">
                                                                    <option value="{{ $product->childcategory_id }}">{{ $product->childCategory->name }}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group wsus__add_address_single">
                                                            <label>Brand</label>
                                                            <div class="wsus__topbar_select">
                                                                <select class="select_2" name="brand_id">
                                                                    <option value="">Select</option>
                                                                    @foreach($brands as $brand)
                                                                        <option @selected($product->brand_id == $brand->id) value="{{ $brand->id }}"> {{ $brand->name }} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group wsus__add_address_single">
                                                            <label>Product Type</label>
                                                            <div class="wsus__topbar_select">
                                                                <select class="select_2" name="type">
                                                                    <option value="" selected>Select</option>
                                                                    <option @selected($product->type == 'new') value="new">New</option>
                                                                    <option @selected($product->type == 'featured') value="featured">Featured</option>
                                                                    <option @selected($product->type == 'top') value="top">Top</option>
                                                                    <option @selected($product->type == 'best') value="best">Best</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group wsus__add_address_single">
                                                            <label>SKU</label>
                                                            <input type="text" class="form-control" name="sku"
                                                                   value="{{ $product->sku }}" placeholder="Write SKU">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-3 ">
                                                        <div class="form-group wsus__add_address_single">
                                                            <label>Price</label>
                                                            <input type="text" class="form-control" name="price"
                                                                   value="{{ $product->price }}" placeholder="Add Price">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 ">
                                                        <div class="form-group wsus__add_address_single">
                                                            <label>Offer Price</label>
                                                            <input type="text" class="form-control" name="offer_price"
                                                                   value="{{ $product->offer_price }}"
                                                                   placeholder="Add Offer Price">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 ">
                                                        <div class="form-group wsus__add_address_single">
                                                            <label>Starting Offer Price Date</label>
                                                            <input type="date" class="form-control" name="offer_start_date" value="{{ $product->offer_start_date }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group wsus__add_address_single">
                                                            <label>Ending Offer Price Date</label>
                                                            <input type="date" class="form-control" name="offer_end_date" value="{{ $product->offer_end_date }}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group wsus__add_address_single">
                                                            <label>Quantity</label>
                                                            <input type="number" min="0" class="form-control" name="quantity"
                                                                   value="{{ $product->quantity }}" placeholder="Add Quantity">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group wsus__add_address_single">
                                                            <label>Status</label>
                                                            <div class="wsus__topbar_select">
                                                                <select class="select_2" name="status">
                                                                    <option @selected($product->status == 'active') value="active" selected>Active</option>
                                                                    <option @selected($product->status == 'archive') value="archive">Archive</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="wsus__add_address_single">
                                                    <label>Description</label>
                                                    <textarea cols="3" rows="5" placeholder="Type Description" name="description">{{ $product->description }}</textarea>
                                                </div>

                                                <div class="form-group wsus__add_address_single">
                                                    <label>Seo Title</label>
                                                    <input type="text" class="form-control" name="seo_title"
                                                           value="{{ $product->seo_title }}" placeholder="Write SEO Title">
                                                </div>

                                                <div class="wsus__add_address_single">
                                                    <label>SEO Description</label>
                                                    <textarea cols="3" rows="5" placeholder="Type SEO Description" name="seo_description">{{ $product->seo_description }}</textarea>
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

@push('scripts')


    <script>
        $(document).ready(function () {
            $('body').on('change', '.main_category', function (e) {
                let id = $(this).val();

                $.ajax({
                    method: 'GET',
                    url: "{{ route('vendor.get_subcategories') }}",
                    data: {
                        id: id
                    },
                    success: function (data) {
                        $('.subcategory').html(`<option value="">  select </option>`)

                        $.each(data, function (i, item) {
                            $('.subcategory').append(`<option value="${item.id}">  ${item.name} </option>`)
                        })
                    },
                    error: function (xhr, status, error) {

                    }

                })
            })

            $('body').on('change', '.subcategory', function (e) {
                let id = $(this).val();

                $.ajax({
                    method: 'GET',
                    url: "{{ route('vendor.childcategories') }}",
                    data: {
                        id: id
                    },
                    success: function (data) {
                        $('.childcategory').html(`<option value="">  select </option>`)
                        console.log(data)
                        $.each(data, function (i, item) {
                            $('.childcategory').append(`<option value="${item.id}">  ${item.name} </option>`)
                        })
                    },
                    error: function (xhr, status, error) {

                    }

                })
            })
        })

    </script>


@endpush
