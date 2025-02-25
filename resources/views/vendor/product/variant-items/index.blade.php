@extends('vendor.layouts.master')

@section('content')

    <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
        <div class="dashboard_content mt-2 mt-md-0">

            <h2 class="mb-3">Product Variant Item</h2>
            <a href="{{ route('vendor.products-variants.index', ['product' => $product->id]) }}" class="btn btn-dark mb-3">back</a>

            <div class="wsus__dashboard_profile">
                <div class="wsus__dash_pro_area">
                    <div class="row">
                        <h3> Variant: {{ $variant->name }} </h3>
                        <a href="{{ route('vendor.product-variant-item.create', ['product' => $product, 'variant' => $variant]) }}" class="btn btn-primary">
                            Add New Variant Item</a>

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
                url: "{{ route('vendor.product-variant-item.status', ':id') }}".replace(':id', id),
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
