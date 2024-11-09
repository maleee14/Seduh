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
                        <h5 class="card-title mb-4 d-inline">Categories</h5>
                        <a href="{{ route('categories.create') }}"
                            class="btn btn-primary mb-4 text-center float-right">Create</a>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Message</th>
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
                responsive: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route('bookings.data') }}'
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
                        data: 'date'
                    },
                    {
                        data: 'time'
                    },
                    {
                        data: 'phone'
                    },
                    {
                        data: 'message'
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
