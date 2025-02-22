@extends('admin.layout.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Create Sub Category</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Mange Website</a></div>
                <div class="breadcrumb-item">Create Category</div>
            </div>
        </div>

        <div class="section-body">
            <div class="col-12">

                <form action="{{ route('admin.child-categories.store') }}" method="post">
                    @csrf
                    <div class="card">

                        <div class="card-body">

                            <div class="form-group">
                                <label>Main Category</label>
                                <select class="custom-select main-category" name="category_id">
                                    <option selected value="">Select</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Sub Category</label>
                                <select class="custom-select sub-category" name="sub_category_id">

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
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

@push('scripts')

    <script>
        $(document).ready(function () {
            $('body').on('change', '.main-category', function (e) {
                let id = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: "{{ route('admin.getSubCategories') }}",
                    data: {
                        id: id
                    },
                    success: function (data) {
                        $('.sub-category').html(`<option value="">  select </option>`)
                        $.each(data, function (i, item) {
                            $('.sub-category').append(`<option value="${item.id}">  ${item.name} </option>`)
                        })
                    },
                    error: function (xhr, status, error) {

                    }

                })
            })
        })
    </script>

@endpush
