@extends('layouts.admin.master')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session()->has('delete'))
                            <div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ session('delete') }}
                            </div>
                        @endif
                        <h5 class="card-title mb-4 d-inline">Products</h5>
                        <a href="{{ route('products.create') }}"
                            class="btn btn-primary mb-4 text-center float-right">Create</a>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col" width="10%">Price</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Description</th>
                                    <th scope="col" width="15%">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            let table = new DataTable('.table', {
                processing: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route('products.data') }}',
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'image',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'price'
                    },
                    {
                        data: 'category'
                    },
                    {
                        data: 'description',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'action',
                        searchable: false,
                        sortable: false
                    }
                ]
            });
        </script>
    @endpush
@endsection
