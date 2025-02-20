@extends('admin.layout.master')

@section('content')
        <section class="section">
            <div class="section-header">
                <h1>Sub Categories</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Mange Categories</a></div>
                    <div class="breadcrumb-item">All SubCategories</div>
                </div>
            </div>

            <div class="section-body">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{route('admin.sub-categories.create')}}" class="btn btn-primary">Add New SubCategory</a>
                        </div>
                        <div class="card-body p-3">
                            <div class="table-responsive">

                                {{ $dataTable->table() }}

                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                <ul class="pagination mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

            </div>
        </section>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        $(document).on('change', '.status-switch', function() {
            let id = $(this).data('id');
            let status = $(this).prop('checked');

            $.ajax({
                url: `sub-categories/${id}/status`,
                method: 'put',
                data: {
                    _token: '{{ csrf_token() }}',
                    status: status
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
