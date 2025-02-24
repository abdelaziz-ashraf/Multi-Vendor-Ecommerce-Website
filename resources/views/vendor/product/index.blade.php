@extends('vendor.layouts.master')

@section('content')

    <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
        <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user"></i> Products</h3>
            <div class="wsus__dashboard_profile">
                <div class="wsus__dash_pro_area">
                    <div class="row">
                        <a href="{{ route('vendor.products.create') }}" class="btn btn-primary"> Add New Product</a>

                        {{ $dataTable->table() }}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        $(document).on('change', '.status-switch', function() {
            let id = $(this).data('id');

            $.ajax({
                url: `products/${id}/status`,
                method: 'put',
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    toastr.success(response.success);
                },
                error: function(xhr) {
                    toastr.error('Error updating status.');
                }
            });
        });
    </script>

@endpush
